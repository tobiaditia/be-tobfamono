<?php

namespace App\Http\Requests\Transaction;

use App\Models\Business;
use App\Models\Transaction;
use App\Models\TransactionItem;
use App\Models\TransactionType;

trait WriteRuleTrait
{

    public function getIdRules(): array
    {
        return [
            'required',
            'exists:'. Transaction::class . ',id'
        ];
    }

    public function getBusinessIdRules(): array
    {
        return [
            'required',
            'exists:'. Business::class . ',id'
        ];
    }

    public function getTransactionTypeIdRules(): array
    {
        return [
            'required',
            'exists:'. TransactionType::class . ',id'
        ];
    }

    public function getTransactionItemIdRules(): array
    {
        return [
            'required',
            'exists:'. TransactionItem::class . ',id'
        ];
    }

    public function getTotalRules(): array
    {
        return [
            'required',
            'integer',
            'min:0',
        ];
    }

    public function getMultiplierRules(): array
    {
        return [
            'required',
            'integer',
            'min:0',
        ];
    }
}
