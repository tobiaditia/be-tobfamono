<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @OA\Schema(
 *   schema="Transaction",
 *   @OA\Property(
 *     property="user_id",
 *     type="int",
 *     example="1"
 *   ),
 *   @OA\Property(
 *     property="address",
 *     type="string",
 *     example="Banjarejo"
 *   ),
 *   @OA\Property(
 *     property="date",
 *     type="string",
 *     example="2023-12-12"
 *   ),
 *   @OA\Property(
 *     property="description",
 *     type="string",
 *     example="tests"
 *   ),
 *   @OA\Property(
 *     property="transaction_type_id",
 *     type="int",
 *     example="1"
 *   ),
 *   @OA\Property(
 *     property="business_category_id",
 *     type="int",
 *     example="1"
 *   ),
 *   @OA\Property(
 *     property="price",
 *     type="int",
 *     example="1000"
 *   )
 * )
 */
class Transaction extends Model
{
    /**
     * ambil transaksi yang bisnis nya user_id nya milik user yang sedang login
     */
    public function scopeCurrentUser($query)
    {
        return $query->whereHas()->where('user_id', auth()->id());
    }


}
