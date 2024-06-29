<?php

namespace App\Models;

use App\Traits\HasTranslations;
use Illuminate\Database\Eloquent\Model;

class BusinessCategory extends Model
{
    use HasTranslations;

    protected $table = 'business_categories';

    public const LELE = 1;
    public const GURAME = 2;

    /**
     * Definisi kolom yang akan ditranslate
     *
     * @var array
     */
    public $translatable = [
        'name'
    ];
}
