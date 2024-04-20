<?php

namespace App\Http\Requests\Location;

use App\Models\City;
use Illuminate\Foundation\Http\FormRequest;

class DistrictAPIRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {

        return [
            'cityId' => [
                'required',
                'exists:'. City::class . ',id'
            ]
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'cityId' => $this->route('cityId')
        ]);
    }
}
