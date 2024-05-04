<?php

namespace App\Repositories;

use App\Models\User;

class UserRepository
{
    /**
     * Mengambil record post
     * @return User
     */
    public function create(array $input): array
    {
        $user = new User();
        $user->name = $input['name'];
        $user->email = $input['email'];
        $user->password = bcrypt($input['password']);
        $user->email_verified_at = now()->toDateTimeString();
        $user->handphone = $input['handphone'];
        $user->save();

        return $this->find($user->id);
    }

    /**
     *
     * @param int $id
     * @param array $request
     * @return array
     */
    public function update(int $id, array $request): array
    {
        $user = User::find($id);
        $user->name = $request['name'];
        $user->handphone = $request['handphone'];
        $user->save();

        return $this->find($user->id);
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
