<?php

namespace App\Http\Requests\Transaction;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTransactionAPIRequest extends FormRequest
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
            'id' => $this->getIdRules(),
            'business_id' => $this->getBusinessIdRules(),
            'transaction_type_id' => $this->getTransactionTypeIdRules(),
            'transaction_item_id' => $this->getTransactionItemIdRules(),
            'total' => $this->getTotalRules(),
            'multiplier' => $this->getMultiplierRules(),
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'id' => $this->route('id')
        ]);
    }
}
