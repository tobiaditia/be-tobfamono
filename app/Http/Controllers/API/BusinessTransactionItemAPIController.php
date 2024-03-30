<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\BusinessTransactionItem;

class BusinessTransactionItemAPIController extends Controller
{

    /**
     * @OA\Get(
     *      path="/api/businessTransactionItems",
     *      summary="Get transaction item data",
     *      tags={"Business Transaction Items"},
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
        $transactionItems = BusinessTransactionItem::all()->toArray();
        return $this->sendResponse($transactionItems, __('messages.retrivied'));
    }

}
