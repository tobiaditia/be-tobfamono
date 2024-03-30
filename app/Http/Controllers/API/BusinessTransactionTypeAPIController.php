<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\BusinessTransactionType;
use App\Models\TransactionType;

class BusinessTransactionTypeAPIController extends Controller
{

    /**
     * @OA\Get(
     *      path="/api/businessTransactionTypes",
     *      summary="Get transaction type data",
     *      tags={"Business Transaction Types"},
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
        $transactionTypes = BusinessTransactionType::all()->toArray();
        return $this->sendResponse($transactionTypes, __('messages.retrivied'));
    }

}
