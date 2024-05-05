<?php

namespace App\Repositories;

use App\Models\Business;
use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;

class BusinessRepository
{
    /**
     *
     * @return array
     */
    public function get(): array
    {
        return Business::with('province','city','district','village')->currentUser()->get()->toArray();
    }

    /**
     *
     * @return array
     */
    public function getByUser(int $userId): array
    {
        return Business::with('province','city','district','village')->where('user_id',$userId)->get()->toArray();
    }


    /**
     *
     * @param int $id
     * @return array
     */
    public function find(int $id): array
    {
        return Business::with('province','city','district','village')->find($id)->toArray();
    }

    /**
     *
     * @param array $request
     * @return array
     */
    public function create(array $request): array
    {
        $business = new Business();
        $business->name = $request['name'];
        $business->user_id = Auth::user()->id;
        $business->address = $request['address'];
        $business->business_category_id = $request['business_category_id'];
        $business->province_id = $request['province_id'];
        $business->city_id = $request['city_id'];
        $business->district_id = $request['district_id'];
        $business->village_id = $request['village_id'];
        $business->save();

        return $this->find($business->id);
    }

    /**
     *
     * @param int $id
     * @param array $request
     * @return array
     */
    public function update(int $id, array $request): array
    {
        $business = Business::find($id);
        $business->name = $request['name'];
        $business->address = $request['address'];
        $business->business_category_id = $request['business_category_id'];
        $business->province_id = $request['province_id'];
        $business->city_id = $request['city_id'];
        $business->district_id = $request['district_id'];
        $business->village_id = $request['village_id'];
        $business->save();

        return $this->find($business->id);
    }

    /**
     * @param int $id
     */
    public function delete(int $id): bool
    {
        return Business::where('id', $id)->delete();
    }

}
