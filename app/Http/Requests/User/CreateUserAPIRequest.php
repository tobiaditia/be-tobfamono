<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class CreateUserAPIRequest extends FormRequest
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
            'name' => ['required'],
            'email' => $this->getEmailRules(),
            'password' => ['required', 'string', 'min:6']
        ];
    }
}
