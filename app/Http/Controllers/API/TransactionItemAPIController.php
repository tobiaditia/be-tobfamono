<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\TransactionItem;

class TransactionItemAPIController extends Controller
{

    /**
     * @OA\Get(
     *      path="/api/transactionItems",
     *      summary="Get transaction item data",
     *      tags={"Transaction Items"},
     *      description="Get transaction item",
     *      security={{"bearer":{}}},
     *      @OA\Response(
     *          response=200,
     *          description="successful get transaction item",
     *      )
     * )
     */
    public function get()
    {
        $transactionItems = TransactionItem::all()->toArray();
        return $this->sendResponse($transactionItems, __('messages.retrivied'));
    }

}
