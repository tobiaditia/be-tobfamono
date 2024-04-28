<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\HasTranslations;

class BusinessTransactionItem extends Model
{
    use HasTranslations;

    public const HASIL_USAHA = 1;
    public const PAKAN = 2;
    public const LISTRIK = 3;

    /**
     * Definisi kolom yang akan ditranslate
     *
     * @var array
     */
    public $translatable = [
        'name'
    ];
}
