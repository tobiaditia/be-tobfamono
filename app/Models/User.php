<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
use Stancl\Tenancy\Database\Concerns\CentralConnection;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $hidden = [
        'password', 'remember_token',
    ];

    // public static function booted () {
    //     static::created(function ($user) {
    //         $userTenant = Tenant::create(['id' => $user->domain]);
    //         $userTenant->domains()->create(['domain' => $user->domain .'.'.env('APP_CENTRAL_DOMAIN')]);
    //     });
    // }


}
