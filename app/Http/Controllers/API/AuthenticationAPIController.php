<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\Authenticate\AuthenticateAPIRequest;
use App\Http\Requests\User\CreateUserAPIRequest;
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
     *      path="/api/authentication/register",
     *      summary="Create User",
     *      tags={"Authentication"},
     *      description="Create User",
     *      @OA\Parameter(
     *          name="body",
     *          in="query",
     *          required=true,
     *          @OA\Schema(
     *              type="object",
     *              @OA\Property(
     *                  property="name",
     *                  type="string",
     *                  example="me"
     *              ),
     *              @OA\Property(
     *                  property="email",
     *                  type="string",
     *                  example="me@tobfa.id"
     *              ),
     *              @OA\Property(
     *                  property="password",
     *                  type="string",
     *                  example="123456"
     *              )
     *          )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="successful operation",
     *      )
     * )
     */
    public function register(CreateUserAPIRequest $request, AuthenticationRepository $repository){
        return $repository->register($request->all());
    }

    /**
     * @return Response
     *
     * @OA\Post(
     *      path="/api/authentication/logout",
     *      summary="Login to systems and return the token and inits data.",
     *      tags={"Authentication"},
     *      security={{"bearer":{}}},
     *      description="Do Logout",
     *      @OA\Response(
     *          response=200,
     *          description="successful operation",
     *      )
     * )
     */
    public function logout(AuthenticationRepository $repository)
    {
        $logout = $repository->logout();

        return $this->sendResponse($logout, __('messages.authenticate.logout'));
    }
}
