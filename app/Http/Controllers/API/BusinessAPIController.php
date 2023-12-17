<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\Business\CreateBusinessAPIRequest;
use App\Http\Requests\Business\FindBusinessAPIRequest;
use App\Models\Business;
use App\Models\User;
use App\Repositories\AuthenticationRepository;
use App\Repositories\BusinessRepository;

class BusinessAPIController extends Controller
{

    /**
     * @OA\Get(
     *      path="/api/business",
     *      summary="Get business data",
     *      tags={"Business"},
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
     *      path="/api/business/{id}",
     *      summary="Find business data",
     *      tags={"Business"},
     *      description="Find Business",
     *      security={{"bearer":{}}},
     *      @OA\Response(
     *          response=200,
     *          description="successful get business",
     *      )
     * )
     */
    public function find(FindBusinessAPIRequest $request, BusinessRepository $businessRepository)
    {
        $business = $businessRepository->get();
        return $this->sendResponse($business, __('messages.retrivied'));
    }

    /**
     * Create Business 
     * @param CreateBusinessAPIRequest $request
     * 
     * @OA\Post(
     *      path="/api/business",
     *      summary="Post business data",
     *      tags={"Business"},
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
}
