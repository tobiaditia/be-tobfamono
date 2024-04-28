<?php

namespace App\Http\Requests\Business;

use App\Models\Business;
use App\Models\BusinessCategory;
use App\Models\City;
use App\Models\District;
use App\Models\Province;
use App\Models\Village;
use Illuminate\Validation\Rule;

trait WriteRuleTrait
{

    public function getIdRules(): array
    {
        return [
            'required',
            'exists:'. Business::class . ',id'
        ];
    }

    public function getNameRules(): array
    {
        return [
            'required',
            'string',
            'min:4',
            'max:255',
        ];
    }
    
    public function getAddressRules(): array
    {
        return [
            'nullable',
            'string',
            'min:4',
            'max:500',
        ];
    }
    
    public function getBusinessCategoryIdRules(): array
    {
        return [
            'required',
            'exists:'. BusinessCategory::class . ',id'
        ];
    }

    public function getProvinceIdRules(): array
    {
        return [
            'required',
            'exists:'. Province::class . ',id'
        ];
    }

    public function getCityIdRules(array $input): array
    {
        return [
            'required',
            Rule::exists(City::class, 'id')
                    ->where('province_id', $input['province_id']),
        ];
    }

    public function getDistrictIdRules(array $input): array
    {
        return [
            'required',
            Rule::exists(District::class, 'id')
                    ->where('city_id', $input['city_id']),
        ];
    }

    public function getVillageIdRules(array $input): array
    {
        return [
            'required',
            Rule::exists(Village::class, 'id')
                    ->where('district_id', $input['district_id']),
        ];
    }

}