<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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
}
