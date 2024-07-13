<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Attachment extends Model
{
    const TYPE_BUSINESS_TRANSACTION = 1;
    const TYPE_TRANSACTION = 2;

    protected $casts = [
        'name' => 'string',
    ];

    public function getNameAttribute()
    {
        return url($this->attributes['name']);
    }
}
