<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Business;
use App\Repositories\InitRepository;
use Illuminate\Support\Facades\Auth;

class InitAPIController extends Controller
{

    /**
     * @return Response
     *
     * @OA\Get(
     *      path="/api/inits",
     *      summary="Get init data",
     *      tags={"Init"},
     *      description="Get Init",
     *      security={{"bearer":{}}},
     *      @OA\Response(
     *          response=200,
     *          description="successful get init",
     *      )
     * )
     */
    public function get(InitRepository $initRepository) {
        $init = $initRepository->get();
        return $this->sendResponse($init, __('messages.retrivied'));
    }
}
