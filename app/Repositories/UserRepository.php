<?php

namespace App\Repositories;

use App\Models\User;

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

    /**
     *
     * @param int $id
     * @return array
     */
    public function find(int $id): array
    {
        return User::find($id)->toArray();
    }

}
