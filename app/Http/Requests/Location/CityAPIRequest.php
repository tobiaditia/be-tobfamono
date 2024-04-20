<?php

namespace App\Http\Requests\Location;

use App\Models\Province;
use Illuminate\Foundation\Http\FormRequest;

class CityAPIRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {

        return [
            'provinceId' => [
                'required',
                'exists:'. Province::class . ',id'
            ]
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'provinceId' => $this->route('provinceId')
        ]);
    }
}
