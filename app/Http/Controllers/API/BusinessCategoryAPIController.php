<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\BusinessCategory;

class BusinessCategoryAPIController extends Controller
{

    /**
     * @OA\Get(
     *      path="/api/businessCategories",
     *      summary="Get business category data",
     *      tags={"Business Categories"},
     *      description="Get Business category",
     *      security={{"bearer":{}}},
     *      @OA\Response(
     *          response=200,
     *          description="successful get business category",
     *      )
     * )
     */
    public function get()
    {
        $businessCategory = BusinessCategory::all()->toArray();
        return $this->sendResponse($businessCategory, __('messages.retrivied'));
    }

}
