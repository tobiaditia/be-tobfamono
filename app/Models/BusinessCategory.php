<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class BusinessCategory extends Model
{
    use HasTranslations;
    
    protected $table = 'business_categories';

    /**
     * Definisi kolom yang akan ditranslate
     * 
     * @var array
     */
    public $translatable = [
        'name'
    ];
}
