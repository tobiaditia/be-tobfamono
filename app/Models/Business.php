<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @OA\Schema(
 *   schema="Business",
 *   @OA\Property(
 *     property="name",
 *     type="string",
 *     example="Usaha 1"
 *   ),
 *   @OA\Property(
 *     property="province_id",
 *     type="int",
 *     example="1"
 *   ),
 *   @OA\Property(
 *     property="city_id",
 *     type="int",
 *     example="1"
 *   ),
 *   @OA\Property(
 *     property="district_id",
 *     type="int",
 *     example="144"
 *   ),
 *   @OA\Property(
 *     property="village_id",
 *     type="int",
 *     example="80776"
 *   ),
 *   @OA\Property(
 *     property="address",
 *     type="string",
 *     example="Jakarta"
 *   ),
 *   @OA\Property(
 *     property="business_category_id",
 *     type="int",
 *     example="1"
 *   )
 * )
 */

class Business extends Model
{
    protected $appends = [
        'full_location',
    ];

    /**
     * ambil bisnis yang user_id nya milik user yang sedang login
     */
    public function scopeCurrentUser($query)
    {
        return $query->where('user_id', auth()->id());
    }

    /**
     * Relasi one to many dengan transaksi
     *
     * @return HasMany
     */
    public function transactions(): HasMany
    {
        return $this->hasMany(Transaction::class);
    }

    /**
     *
     * @return BelongsTo
     */
    public function province(): BelongsTo
    {
        return $this->belongsTo(Province::class);
    }

    /**
     *
     * @return BelongsTo
     */
    public function city(): BelongsTo
    {
        return $this->belongsTo(City::class);
    }

    /**
     *
     * @return BelongsTo
     */
    public function district(): BelongsTo
    {
        return $this->belongsTo(District::class);
    }

    /**
     *
     * @return BelongsTo
     */
    public function village(): BelongsTo
    {
        return $this->belongsTo(Village::class);
    }

    public function getFullLocationAttribute()
    {
        $province = Province::find($this->province_id);
        $city = City::find($this->city_id);
        $district = District::find($this->district_id);
        $village = Village::find($this->village_id);
        return $province->name .' - '. $city->name.' - '. $district->name.' - '. $village->name;
    }
}
