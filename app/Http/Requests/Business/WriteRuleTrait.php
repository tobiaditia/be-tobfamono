<?php

namespace App\Http\Requests\Business;

use App\Models\Business;
use App\Models\BusinessCategory;

trait WriteRuleTrait
{

    public function getIdRules(): array
    {
        return [
            'required',
            'exists:'. Business::class . ',id'
        ];
    }

    public function getNameRules(): array
    {
        return [
            'required',
            'string',
            'min:4',
            'max:255',
        ];
    }
    
    public function getAddressRules(): array
    {
        return [
            'required',
            'string',
            'min:4',
            'max:500',
        ];
    }
    
    public function getBusinessCategoryIdRules(): array
    {
        return [
            'required',
            'exists:'. BusinessCategory::class . ',id'
        ];
    }

}