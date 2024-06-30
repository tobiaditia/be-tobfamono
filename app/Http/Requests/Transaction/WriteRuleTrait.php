<?php

namespace App\Http\Requests\Transaction;

use App\Models\BusinessCategory;
use App\Models\Transaction;
use App\Models\TransactionType;
use App\Models\User;

trait WriteRuleTrait
{

    public function getIdRules(): array
    {
        return [
            'required',
            'exists:'. Transaction::class . ',id'
        ];
    }

    public function getUserIdRules(): array
    {
        return [
            'required',
            'exists:'. User::class . ',id'
        ];
    }

    public function getBusinessCategoryIdRules(): array
    {
        return [
            'required',
            'exists:'. BusinessCategory::class . ',id'
        ];
    }

    public function getTransactionTypeIdRules(): array
    {
        return [
            'required',
            'exists:'. TransactionType::class . ',id'
        ];
    }

    public function getPriceRules(): array
    {
        return [
            'required',
            'integer',
            'min:1',
            'max:4294967295'
        ];
    }

    public function getDateRules(): array
    {
        return [
            'required',
            'date',
        ];
    }

    public function getAddressRules(): array
    {
        return [
            'required',
            'string',
            'max:255'
        ];
    }
}
