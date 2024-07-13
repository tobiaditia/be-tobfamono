<?php

namespace App\Http\Requests\BusinessTransaction;

use Illuminate\Foundation\Http\FormRequest;

class CreateBusinessTransactionAPIRequest extends FormRequest
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
            'business_transaction_type_id' => $this->getBusinessTransactionTypeIdRules(),
            'business_transaction_item_id' => $this->getBusinessTransactionItemIdRules(),
            'total' => $this->getTotalRules(),
            'multiplier' => $this->getMultiplierRules(),
            'date' => $this->getDateRules(),
            'attachment' => $this->getAttachmentRules()
        ];
    }

}
