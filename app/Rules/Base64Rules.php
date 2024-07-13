<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class Base64Rules implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        // Decode the base64 string
        $decodedImage = base64_decode($value);

        // Get the size in bytes
        $imageSize = strlen($decodedImage);

        //max 2 MB

        if (($imageSize / 1024 / 1024) <= 2) {
            $fail('Gambar tidak boleh lebih dari 2 MB.');
        }

        if (preg_match('/^data:([\w\/]+);base64,/', $value, $matches)) {
            $mimeType = $matches[1];

            if (!in_array($mimeType, ['image/jpeg', 'image/png'])) {
                $fail('Format gambar harus jpg atau png');
            }

            // Decode the base64 string
            $decodedImage = base64_decode(preg_replace('/^data:([\w\/]+);base64,/', '', $value));

            // Get the size in bytes
            $imageSize = strlen($decodedImage);

            // Convert the size to megabytes and check if it exceeds the max size
            if (($imageSize / 1024 / 1024) > 2) {
                $fail('Gambar tidak boleh lebih dari 2 MB.');
            }
        } else {
            $fail('Format gambar harus jpg atau png');
        }
    }
}
