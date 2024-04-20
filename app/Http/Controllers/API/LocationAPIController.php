<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\Location\CityAPIRequest;
use App\Http\Requests\Location\DistrictAPIRequest;
use App\Http\Requests\Location\VillageAPIRequest;
use App\Repositories\LocationRepository;
use Illuminate\Http\Request;

class LocationAPIController extends Controller
{

    /**
     * @OA\Get(
     *      path="/api/provinces",
     *      summary="Get Province data",
     *      tags={"Location"},
     *      @OA\Response(
     *          response=200,
     *          description="successful get business",
     *      )
     * )
     */
    public function provinces(LocationRepository $locationRepository)
    {
        $data = $locationRepository->provinces();
        return $this->sendResponse($data, __('messages.retrivied'));
    }

    /**
     * @OA\Get(
     *      path="/api/cities/{provinceId}",
     *      summary="Get cities data",
     *      tags={"Location"},
     *       @OA\Parameter(
     *          name="provinceId",
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
    public function cities(CityAPIRequest $request, int $provinceId, LocationRepository $locationRepository)
    {
        $data = $locationRepository->cities($provinceId);
        return $this->sendResponse($data, __('messages.retrivied'));
    }

    /**
     * @OA\Get(
     *      path="/api/districts/{cityId}",
     *      summary="Get districts data",
     *      tags={"Location"},
     *       @OA\Parameter(
     *          name="cityId",
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
    public function districts(DistrictAPIRequest $request, int $cityId, LocationRepository $locationRepository)
    {
        $data = $locationRepository->districts($cityId);
        return $this->sendResponse($data, __('messages.retrivied'));
    }

    /**
     * @OA\Get(
     *      path="/api/villages/{districtId}",
     *      summary="Get villages data",
     *      tags={"Location"},
     *       @OA\Parameter(
     *          name="districtId",
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
    public function villages(VillageAPIRequest $request, int $districtId, LocationRepository $locationRepository)
    {
        $data = $locationRepository->villages($districtId);
        return $this->sendResponse($data, __('messages.retrivied'));
    }

    /**
     * @OA\Get(
     *      path="/api/search",
     *      summary="Get villages data",
     *      tags={"Location"},
     *      @OA\Parameter(
     *         name="search",
     *         @OA\Schema(
     *             type="string",
     *         ),
     *         in="query"
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="successful get business",
     *      )
     * )
     */
    public function search(Request $request, LocationRepository $locationRepository)
    {
        $data = $locationRepository->search($request->all());
        return $this->sendResponse($data, __('messages.retrivied'));
    }

}
