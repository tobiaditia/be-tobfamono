<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\Transaction\CreateTransactionAPIRequest;
use App\Http\Requests\Transaction\DeleteTransactionAPIRequest;
use App\Http\Requests\Transaction\FindTransactionAPIRequest;
use App\Http\Requests\Transaction\UpdateTransactionAPIRequest;
use App\Repositories\TransactionRepository;

class TransactionAPIController extends Controller
{

    /**
     * @OA\Get(
     *      path="/api/transactions",
     *      summary="Get transaction data",
     *      tags={"Transactions"},
     *      description="Get transaction",
     *      security={{"bearer":{}}},
     *      @OA\Response(
     *          response=200,
     *          description="successful get transaction item",
     *      )
     * )
     */
    public function get(TransactionRepository $repo)
    {
        $transactions = $repo->get();
        return $this->sendResponse($transactions, __('messages.retrivied'));
    }

    /**
     * @OA\Get(
     *      path="/api/transactions/{id}",
     *      summary="Find transaction data",
     *      tags={"Transactions"},
     *      description="Find Transaction",
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
     *          description="successful get Transaction",
     *      )
     * )
     */
    public function find(FindTransactionAPIRequest $request, int $id, TransactionRepository $repo)
    {
        $repo = $repo->find($id);
        return $this->sendResponse($repo, __('messages.retrivied'));
    }

    /**
     * Create Transactions
     * @param CreateTransactionAPIRequest $request
     *
     * @OA\Post(
     *      path="/api/transactions",
     *      summary="Post transaction data",
     *      tags={"Transactions"},
     *      description="Post Transactions",
     *      security={{"bearer":{}}},
     *
     *      @OA\RequestBody(
     *          @OA\JsonContent(ref="#/components/schemas/Transaction")
     *      ),
     *
     *      @OA\Response(
     *          response=200,
     *          description="successful Post transaction",
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
    public function create(CreateTransactionAPIRequest $request, TransactionRepository $repo)
    {
        $transaction = $repo->create($request->all());
        return $this->sendResponse($transaction, __('messages.retrivied'));
    }

    /**
     * Put Transaction
     * @param UpdateTransactionAPIRequest $request
     * @param int $id
     *
     * @OA\Put(
     *      path="/api/transactions/{id}",
     *      summary="Put transaction data",
     *      tags={"Transactions"},
     *      description="Put Transaction",
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
     *          @OA\JsonContent(ref="#/components/schemas/Transaction")
     *      ),
     *
     *      @OA\Response(
     *          response=200,
     *          description="successful Put transaction",
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
    public function update(UpdateTransactionAPIRequest $request, int $id, TransactionRepository $repo)
    {
        $transaction = $repo->update($id, $request->all());
        return $this->sendResponse($transaction, __('messages.retrivied'));
    }

    /**
     * @OA\Delete(
     *      path="/api/transactions/{id}",
     *      summary="Delete transaction data",
     *      tags={"Transactions"},
     *      description="Delete Transaction",
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
     *          description="successful delete transaction",
     *      )
     * )
     */
    public function delete(DeleteTransactionAPIRequest $request, int $id, TransactionRepository $repo)
    {
        $transaction = $repo->delete($id);
        return $this->sendResponse($transaction, __('messages.retrivied'));
    }

}
