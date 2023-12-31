<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\HasTranslations;

class TransactionItem extends Model
{
    use HasTranslations;

    /**
     * Definisi kolom yang akan ditranslate
     *
     * @var array
     */
    public $translatable = [
        'name'
    ];
}
