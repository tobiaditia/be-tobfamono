<?php

namespace App\Http\Requests\Transaction;

use Illuminate\Foundation\Http\FormRequest;

class CreateTransactionAPIRequest extends FormRequest
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
            'business_id' => $this->getBusinessIdRules(),
            'transaction_type_id' => $this->getTransactionTypeIdRules(),
            'transaction_item_id' => $this->getTransactionItemIdRules(),
            'total' => $this->getTotalRules(),
            'multiplier' => $this->getMultiplierRules(),
            'date' => $this->getDateRules(),
        ];
    }
}
