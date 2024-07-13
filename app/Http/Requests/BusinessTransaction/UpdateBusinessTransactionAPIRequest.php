<?php

namespace App\Http\Requests\BusinessTransaction;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBusinessTransactionAPIRequest extends FormRequest
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
            'business_transaction_type_id' => $this->getBusinessTransactionTypeIdRules(),
            'business_transaction_item_id' => $this->getBusinessTransactionItemIdRules(),
            'total' => $this->getTotalRules(),
            'multiplier' => $this->getMultiplierRules(),
            'date' => $this->getDateRules(),
            'attachment' => $this->getAttachmentRules()
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'id' => $this->route('id')
        ]);
    }
}
