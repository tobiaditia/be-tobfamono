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

}