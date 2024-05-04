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

    /**
     *
     * @param array $input
     * @return array
     */
    public function search(array $input): array
    {
        $search = $input['search'] ?? null;

        $villages = Village::when(null != $search, function ($query) use ($search) {
                $query->where('name', 'like', '%'.$search.'%')
                    ->orWhere('pos_code', 'like', '%'.$search.'%');
            })
            ->limit(50)
            ->get()
        ;

        $data = [];

        foreach ($villages as $village) {
            $district = District::where('id', $village->district_id)->first();
            $city = City::where('id', $district->city_id)->first();
            $province = Province::where('id', $city->province_id)->first();

            $village->full_name = $province->name . ' - ' . 
                $city->name . ' - ' .
                $district->name . ' - ' .
                $village->name . ' (' . $village->pos_code . ')';

            $data[] = $village;
        }

        return $data;
    }

}
