<?php

namespace App\Http\Requests\BusinessTransaction;

use App\Models\Business;
use App\Models\BusinessTransaction;
use App\Models\BusinessTransactionItem;
use App\Models\BusinessTransactionType;
use App\Rules\Base64Rules;

trait WriteRuleTrait
{

    public function getIdRules(): array
    {
        return [
            'required',
            'exists:'. BusinessTransaction::class . ',id'
        ];
    }

    public function getBusinessIdRules(): array
    {
        return [
            'required',
            'exists:'. Business::class . ',id'
        ];
    }

    public function getBusinessTransactionTypeIdRules(): array
    {
        return [
            'required',
            'exists:'. BusinessTransactionType::class . ',id'
        ];
    }

    public function getBusinessTransactionItemIdRules(): array
    {
        return [
            'required',
            'exists:'. BusinessTransactionItem::class . ',id'
        ];
    }

    public function getTotalRules(): array
    {
        return [
            'required',
            'integer',
            'min:1',
            'max:4294967295'
        ];
    }

    public function getMultiplierRules(): array
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

    public function getAttachmentRules(): array
    {
        return [
            'nullable',
            new Base64Rules
        ];
    }
}
