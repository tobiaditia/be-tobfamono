<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * @OA\Schema(
 *   schema="BusinessTransaction",
 *   @OA\Property(
 *     property="business_id",
 *     type="int",
 *     example="1"
 *   ),
 *   @OA\Property(
 *     property="business_transaction_type_id",
 *     type="int",
 *     example="1"
 *   ),
 *   @OA\Property(
 *     property="business_transaction_item_id",
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
 *   @OA\Property(
 *     property="date",
 *     type="string",
 *     example="2023-12-12"
 *   ),
 *   @OA\Property(
 *     property="description",
 *     type="string",
 *     example="abc"
 *   ),
 *   @OA\Property(
 *     description="Attachment",
 *     property="attachment",
 *     type="file"
 *   )
 * )
 */
class BusinessTransaction extends Model
{
    /**
     * ambil transaksi yang bisnis nya user_id nya milik user yang sedang login
     */
    public function scopeCurrentUser($query)
    {
        return $query->whereHas()->where('user_id', auth()->id());
    }

    public function business()
    {
        return $this->belongsTo(Business::class);
    }

    /**
     *
     * @return BelongsTo
     */
    public function businessTransactionItem(): BelongsTo
    {
        return $this->belongsTo(BusinessTransactionItem::class);
    }

    /**
     *
     * @return HasMany
     */
    public function attachments(): HasMany
    {
        return $this->hasMany(Attachment::class, 'source_id')->where('type_id', Attachment::TYPE_BUSINESS_TRANSACTION);
    }
}
