<?php

namespace App\Http\Requests\Business;

use Illuminate\Foundation\Http\FormRequest;

class DeleteBusinessAPIRequest extends FormRequest
{

    use WriteRuleTrait;

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {

        return [
            'id' => $this->getIdRules()
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'id' => $this->route('id')
        ]);
    }
}
