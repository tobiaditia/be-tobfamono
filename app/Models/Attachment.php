<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Attachment extends Model
{
    const TYPE_BUSINESS_TRANSACTION = 1;
    const TYPE_TRANSACTION = 2;

    protected $casts = [
        'name' => 'string',
    ];

    public function getNameAttribute()
    {
        return Storage::disk('public')->url(($this->attributes['name']));
    }
}
