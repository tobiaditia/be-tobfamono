<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\Business\CreateBusinessAPIRequest;
use App\Http\Requests\Business\DeleteBusinessAPIRequest;
use App\Http\Requests\Business\FindBusinessAPIRequest;
use App\Http\Requests\Business\UpdateBusinessAPIRequest;
use App\Http\Requests\User\FindUserAPIRequest;
use App\Repositories\BusinessRepository;

class BusinessAPIController extends Controller
{

    /**
     * @OA\Get(
     *      path="/api/businesses",
     *      summary="Get business data",
     *      tags={"Businesses"},
     *      description="Get Business",
     *      security={{"bearer":{}}},
     *      @OA\Response(
     *          response=200,
     *          description="successful get business",
     *      )
     * )
     */
    public function get(BusinessRepository $businessRepository)
    {
        $business = $businessRepository->get();
        return $this->sendResponse($business, __('messages.retrivied'));
    }

    /**
     * @OA\Get(
     *      path="/api/businesses/user/{id}",
     *      summary="Get business data by user",
     *      tags={"Businesses"},
     *      description="Get Business by user",
     *      security={{"bearer":{}}},
     *      @OA\Parameter(
     *          name="id",
     *          in="path",
     *          required=true,
     *          @OA\Schema(
     *              type="integer",
     *          )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="successful get business",
     *      )
     * )
     */
    public function getByUser(int $id, FindUserAPIRequest $request, BusinessRepository $businessRepository)
    {
        $business = $businessRepository->getByUser($id);
        return $this->sendResponse($business, __('messages.retrivied'));
    }

    /**
     * @OA\Get(
     *      path="/api/businesses/{id}",
     *      summary="Find business data",
     *      tags={"Businesses"},
     *      description="Find Business",
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
     *          description="successful get business",
     *      )
     * )
     */
    public function find(FindBusinessAPIRequest $request, int $id, BusinessRepository $businessRepository)
    {
        $business = $businessRepository->find($id);
        return $this->sendResponse($business, __('messages.retrivied'));
    }

    /**
     * Create Business
     * @param CreateBusinessAPIRequest $request
     *
     * @OA\Post(
     *      path="/api/businesses",
     *      summary="Post business data",
     *      tags={"Businesses"},
     *      description="Post Business",
     *      security={{"bearer":{}}},
     *
     *      @OA\RequestBody(
     *          @OA\JsonContent(ref="#/components/schemas/Business")
     *      ),
     *
     *      @OA\Response(
     *          response=200,
     *          description="successful Post business",
     *      ),
     *      @OA\Response(
     *          response=400,
     *          description="Invalid input"
     *      ),
     *      @OA\Response(
     *          response=404,
     *          description="Not found",
     *      )
     * )
     */
    public function create(CreateBusinessAPIRequest $request, BusinessRepository $businessRepository)
    {
        $business = $businessRepository->create($request->all());
        return $this->sendResponse($business, __('messages.retrivied'));
    }

    /**
     * Create Business
     * @param UpdateBusinessAPIRequest $request
     * @param int $id
     *
     * @OA\Put(
     *      path="/api/businesses/{id}",
     *      summary="Put business data",
     *      tags={"Businesses"},
     *      description="Put Business",
     *      security={{"bearer":{}}},
     *
     *      @OA\Parameter(
     *          name="id",
     *          in="path",
     *          required=true,
     *          @OA\Schema(
     *              type="integer",
     *          )
     *      ),
     *
     *      @OA\RequestBody(
     *          @OA\JsonContent(ref="#/components/schemas/Business")
     *      ),
     *
     *      @OA\Response(
     *          response=200,
     *          description="successful Put business",
     *      ),
     *      @OA\Response(
     *          response=400,
     *          description="Invalid input"
     *      ),
     *      @OA\Response(
     *          response=404,
     *          description="Not found",
     *      )
     * )
     */
    public function update(UpdateBusinessAPIRequest $request, int $id, BusinessRepository $businessRepository)
    {
        $business = $businessRepository->update($id, $request->all());
        return $this->sendResponse($business, __('messages.retrivied'));
    }

    /**
     * @OA\Delete(
     *      path="/api/businesses/{id}",
     *      summary="Delete business data",
     *      tags={"Businesses"},
     *      description="Delete Business",
     *      security={{"bearer":{}}},
     *      @OA\Parameter(
     *          name="id",
     *          in="path",
     *          required=true,
     *          @OA\Schema(
     *              type="integer",
     *          )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="successful delete business",
     *      )
     * )
     */
    public function delete(DeleteBusinessAPIRequest $request, int $id, BusinessRepository $businessRepository)
    {
        $business = $businessRepository->delete($id);
        return $this->sendResponse($business, __('messages.retrivied'));
    }
}
