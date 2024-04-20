<?php

namespace App\Http\Requests\Location;

use App\Models\District;
use Illuminate\Foundation\Http\FormRequest;

class VillageAPIRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {

        return [
            'districtId' => [
                'required',
                'exists:'. District::class . ',id'
            ]
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'districtId' => $this->route('districtId')
        ]);
    }
}
