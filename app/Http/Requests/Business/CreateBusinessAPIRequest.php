<?php

namespace App\Http\Requests\Business;

use Illuminate\Foundation\Http\FormRequest;

class CreateBusinessAPIRequest extends FormRequest
{

    use WriteRuleTrait;

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $input = $this->all();
        return [
            'name' => $this->getNameRules(),
            'address' => $this->getAddressRules(),
            'business_category_id' => $this->getBusinessCategoryIdRules(),
            'province_id' => $this->getProvinceIdRules(),
            'city_id' => $this->getCityIdRules($input),
            'district_id' => $this->getDistrictIdRules($input),
            'village_id' => $this->getVillageIdRules($input),
        ];
    }
}
