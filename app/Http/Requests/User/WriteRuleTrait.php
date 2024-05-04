<?php

namespace App\Http\Requests\User;

use App\Models\User;

trait WriteRuleTrait
{

    public function getIdRules(): array
    {
        return [
            'required',
            'exists:'. User::class . ',id'
        ];
    }

    public function getEmailRules(): array
    {
        return [
            'required', 
            'email', 
            'unique:users,email'
        ];
    }

}