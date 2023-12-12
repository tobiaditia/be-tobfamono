<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\Authenticate\AuthenticateAPIRequest;
use App\Models\Tenant\Business;
use App\Models\User;
use App\Repositories\AuthenticationRepository;

class AuthenticationAPIController extends Controller
{

    /**
     * @param AuthenticateAPIRequest $request
     * @return Response
     *
     * @OA\Post(
     *      path="/api/authentication/authenticate",
     *      summary="Login to systems and return the token and inits data.",
     *      tags={"Authentication"},
     *      description="Do Login",
     *      @OA\Parameter(
     *          name="body",
     *          in="query",
     *          description="Login Username & Password",
     *          required=true,
     *          @OA\Schema(
     *              type="object",
     *              @OA\Property(
     *                  property="email",
     *                  type="string",
     *                  example="me@tobfa.id"
     *              ),
     *              @OA\Property(
     *                  property="password",
     *                  type="string",
     *                  example="123456"
     *              ),
     *              @OA\Property(
     *                  property="remember_me",
     *                  type="integer",
     *                  example="1"
     *              )
     *          )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="successful operation",
     *      )
     * )
     */
    public function authenticate(AuthenticateAPIRequest $request, AuthenticationRepository $repository)
    {
        return $repository->authenticate($request->all());
    }

    /**
     * @return Response
     *
     * @OA\Post(
     *      path="/api/authentication/logout",
     *      summary="Login to systems and return the token and inits data.",
     *      tags={"Authentication"},
     *      description="Do Login",
     *      @OA\Response(
     *          response=200,
     *          description="successful operation",
     *      )
     * )
     */
    public function logout(AuthenticationRepository $repository)
    {
        // return Business::get();
        return $repository->logout();
    }
}
