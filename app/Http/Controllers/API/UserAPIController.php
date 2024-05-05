<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\CreateUserAPIRequest;
use App\Http\Requests\User\FindUserAPIRequest;
use App\Http\Requests\User\UpdatePasswordUserAPIRequest;
use App\Http\Requests\User\UpdateUserAPIRequest;
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
     *                  property="handphone",
     *                  type="string",
     *                  example="085134221456"
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

    /**
     * @return Response
     *
     * @OA\Put(
     *      path="/api/users/{id}",
     *      summary="Update User",
     *      tags={"User"},
     *      description="Update User",
     *      security={{"bearer":{}}},
     *      @OA\Parameter(
     *          name="id",
     *          in="path",
     *          required=true,
     *          @OA\Schema(
     *              type="integer",
     *          )
     *      ),
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
     *                  property="handphone",
     *                  type="string",
     *                  example="085134221456"
     *              )
     *          )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="successful operation",
     *      )
     * )
     */
    public function update(int $id, UpdateUserAPIRequest $request, UserRepository $userRepository) {
        $user = $userRepository->update($id, $request->all());
        return $this->sendResponse($user, __('messages.retrivied'));
    }

    /**
     * @return Response
     *
     * @OA\Put(
     *      path="/api/users/{id}/password",
     *      summary="Update User password",
     *      tags={"User"},
     *      description="Update User password",
     *      security={{"bearer":{}}},
     *      @OA\Parameter(
     *          name="id",
     *          in="path",
     *          required=true,
     *          @OA\Schema(
     *              type="integer",
     *          )
     *      ),
     *      @OA\Parameter(
     *          name="body",
     *          in="query",
     *          required=true,
     *          @OA\Schema(
     *              type="object",
     *              @OA\Property(
     *                  property="password",
     *                  type="string",
     *                  example="123456"
     *              ),
     *              @OA\Property(
     *                  property="password2",
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
    public function updatePassword(int $id, UpdatePasswordUserAPIRequest $request, UserRepository $userRepository) {
        $user = $userRepository->updatePassword($id, $request->all());
        return $this->sendResponse($user, __('messages.retrivied'));
    }

    /**
     * @OA\Get(
     *      path="/api/users/{id}",
     *      summary="Find user data",
     *      tags={"User"},
     *      description="Find User",
     *      security={{"bearer":{}}},
     *       @OA\Parameter(
     *          name="id",
     *          in="path",
     *          required=true,
     *          @OA\Schema(
     *              type="integer",
     *          )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="successful get user",
     *      )
     * )
     */
    public function find(FindUserAPIRequest $request, int $id, UserRepository $userRepository)
    {
        $userRepository = $userRepository->find($id);
        return $this->sendResponse($userRepository, __('messages.retrivied'));
    }
}
