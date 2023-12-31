<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
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
 *     property="address",
 *     type="string",
 *     example="Jakarta"
 *   ),
 *   @OA\Property(
 *     property="business_category_id",
 *     type="int",
 *     example="1"
 *   ),
 * )
 */

class Business extends Model
{
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
}
