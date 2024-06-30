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
            'user_id' => $this->getUserIdRules(),
            'description' => $this->getAddressRules(),
            'address' => $this->getAddressRules(),
            'date' => $this->getDateRules(),
            'transaction_type_id' => $this->getTransactionTypeIdRules(),
            'business_category_id' => $this->getBusinessCategoryIdRules(),
            'price' => $this->getPriceRules(),
        ];
    }
}
