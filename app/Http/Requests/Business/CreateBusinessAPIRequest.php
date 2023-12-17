<?php

namespace App\Http\Requests\Business;

use Illuminate\Foundation\Http\FormRequest;

class CreateBusinessAPIRequest extends FormRequest
{

    use WriteRuleTrait;

    // public function authorize()
    // {
    //     return true;
    // }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => $this->getNameRules(),
            'address' => $this->getAddressRules(),
            'business_category_id' => $this->getBusinessCategoryIdRules(),
        ];
    }
}
