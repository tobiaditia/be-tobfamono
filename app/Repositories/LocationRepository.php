<?php

namespace App\Repositories;

use App\Models\Business;
use App\Models\City;
use App\Models\District;
use App\Models\Province;
use App\Models\Village;
use Illuminate\Support\Facades\Auth;

class LocationRepository
{
    /**
     *
     * @return array
     */
    public function provinces(): array
    {
        return Province::get()->toArray();
    }

    /**
     *
     * @param int $provinceId
     * @return array
     */
    public function cities(int $provinceId): array
    {
        return City::where('province_id', $provinceId)->get()->toArray();
    }

    /**
     *
     * @param int $cityId
     * @return array
     */
    public function districts(int $cityId): array
    {
        return District::where('city_id', $cityId)->get()->toArray();
    }

    /**
     *
     * @param int $districtId
     * @return array
     */
    public function villages(int $districtId): array
    {
        return Village::where('district_id', $districtId)->get()->toArray();
    }

}
