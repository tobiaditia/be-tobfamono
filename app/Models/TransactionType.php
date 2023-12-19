<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\HasTranslations;

class TransactionType extends Model
{
    use HasTranslations;

    public const BUY = 1;
    public const SELL = 2;

    /**
     * Definisi kolom yang akan ditranslate
     *
     * @var array
     */
    public $translatable = [
        'name'
    ];
}
