<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @OA\Schema(
 *   schema="Transaction",
 *   @OA\Property(
 *     property="business_id",
 *     type="int",
 *     example="1"
 *   ),
 *   @OA\Property(
 *     property="transaction_type_id",
 *     type="int",
 *     example="1"
 *   ),
 *   @OA\Property(
 *     property="transaction_item_id",
 *     type="int",
 *     example="1"
 *   ),
 *   @OA\Property(
 *     property="total",
 *     type="int",
 *     example="1000"
 *   ),
 *   @OA\Property(
 *     property="multiplier",
 *     type="int",
 *     example="1"
 *   ),
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
