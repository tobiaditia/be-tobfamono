<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\TransactionType;

class TransactionTypeAPIController extends Controller
{

    /**
     * @OA\Get(
     *      path="/api/transactionTypes",
     *      summary="Get transaction type data",
     *      tags={"Transaction Types"},
     *      description="Get transaction type",
     *      security={{"bearer":{}}},
     *      @OA\Response(
     *          response=200,
     *          description="successful get transaction type",
     *      )
     * )
     */
    public function get()
    {
        $transactionTypes = TransactionType::all()->toArray();
        return $this->sendResponse($transactionTypes, __('messages.retrivied'));
    }

}
