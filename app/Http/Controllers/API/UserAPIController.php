<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\CreateUserAPIRequest;
use App\Repositories\UserRepository;

class UserAPIController extends Controller
{

    /**
     * @return Response
     *
     * @OA\Post(
     *      path="/api/users",
     *      summary="Create User",
     *      tags={"User"},
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
    public function create(CreateUserAPIRequest $request, UserRepository $userRepository) {
        return $userRepository->create($request->all());
    }
}
