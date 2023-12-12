<?php

namespace App\Repositories;

use App\Models\Hr\HrPost;
use App\Models\Hr\HrPostType;
use App\Models\Hr\HrPostViewer;
use App\Models\Tenant;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserRepository
{
    /**
     * Mengambil record post
     * @return array
     */
    public function create(array $input)
    {
        $user = new User();
        $user->name = $input['name'];
        $user->email = $input['email'];
        $user->password = bcrypt($input['password']);
        $user->email_verified_at = now()->toDateTimeString();
        $user->save();
        $user->refresh();

        return $user;
    }

}
