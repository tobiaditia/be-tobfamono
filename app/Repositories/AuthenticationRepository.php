<?php

namespace App\Repositories;

use App\Models\Hr\HrPost;
use App\Models\Hr\HrPostType;
use App\Models\Hr\HrPostViewer;
use App\Models\Tenant;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthenticationRepository
{
    /**
     * Mengambil record post
     * @return array
     */
    public function authenticate(array $input)
    {
        // tenancy()->initialize('me');
        $attemp = Auth::attempt(['email' => $input['email'], 'password' => $input['password']]);
        if ($attemp) {
            // successfull authentication
            $user = User::find(Auth::user()->id);

            $user_token['token'] = $user->createToken('appToken')->accessToken;
            // tenancy()->end();
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

    public function logout()
    {

        // return tenancy()->tenant;
        if(Auth::check()){

            $user = Auth::user();
            $revoke = $user->token()->revoke();

            if($revoke){
                return response()->json([
                    'success' => true,
                    'message' => 'Logout success',
                ], 200);
            }else{
                return response()->json([
                    'success' => false,
                    'message' => 'Logout fail',
                ], 401);
            }
        }else{
            return response()->json([
                'success' => false,
                'message' => 'User not login',
            ], 401);
        }
    }

}
