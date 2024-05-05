<?php

namespace App\Repositories;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Laravel\Passport\TokenRepository;

class AuthenticationRepository
{
    /**
     * Mengambil record post
     * @return array
     */
    public function authenticate(array $input)
    {
        $attemp = Auth::attempt(['email' => $input['email'], 'password' => $input['password']]);
        if ($attemp) {
            $user = User::find(Auth::user()->id);
            $user_token = $user->createToken('appToken')->accessToken;

            return response()->json([
                'success' => true,
                'token' => $user_token,
                'user' => $user,
            ], 200);
        } else {
            // failure to authenticate
            return response()->json([
                'success' => false,
                'message' => 'Failed to authenticate.',
            ], 401);
        }
    }

    /**
     * Mengambil record post
     * @return array
     */
    public function register(array $input)
    {
        /** @var UserRepository */
        $userRepo = app(UserRepository::class);
        $user = $userRepo->create($input);
        $user = User::find($user['id']);
        $user_token = $user->createToken('appToken')->accessToken;

        return response()->json([
            'success' => true,
            'token' => $user_token,
            'user' => $user,
        ], 200);
    }

    /**
     * Proses logout
     */
    public function logout()
    {
        $user = Auth::user();
        $tokenId = $user->token()->id;
        $tokenRepository = app(TokenRepository::class);
        $tokenRepository->revokeAccessToken($tokenId);
    }

}
