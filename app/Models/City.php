<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    public $timestamps = false;

    public function getNameAttribute($value)
    {
        if ($this->type == 1) {
            return 'Kota ' . $value;
        } else {
            return 'Kabupaten ' . $value;
        }
    }
}
