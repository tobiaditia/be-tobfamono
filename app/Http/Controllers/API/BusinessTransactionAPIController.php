<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\BusinessTransaction\CreateBusinessTransactionAPIRequest;
use App\Http\Requests\BusinessTransaction\CreateTransactionAPIRequest;
use App\Http\Requests\BusinessTransaction\DeleteBusinessTransactionAPIRequest;
use App\Http\Requests\BusinessTransaction\FindBusinessTransactionAPIRequest;
use App\Http\Requests\BusinessTransaction\UpdateBusinessTransactionAPIRequest;
use App\Http\Requests\BusinessTransaction\UpdateTransactionAPIRequest;
use App\Repositories\BusinessTransactionRepository;
use Illuminate\Http\Request;

class BusinessTransactionAPIController extends Controller
{

    /**
     * @OA\Get(
     *      path="/api/businessTransactions",
     *      summary="Get transaction data",
     *      tags={"Business Transactions"},
     *      description="Get transaction",
     *      security={{"bearer":{}}},
     *      @OA\Response(
     *          response=200,
     *          description="successful get transaction item",
     *      )
     * )
     */
    public function get(BusinessTransactionRepository $repo)
    {
        $businessTransactions = $repo->get();
        return $this->sendResponse($businessTransactions, __('messages.retrivied'));
    }

    /**
     * @OA\Get(
     *      path="/api/businessTransactions/{id}",
     *      summary="Get transaction data",
     *      tags={"Business Transactions"},
     *      description="Get transaction",
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
     *          description="successful get transaction item",
     *      )
     * )
     */
    public function find(int $id, FindBusinessTransactionAPIRequest $request, BusinessTransactionRepository $repo)
    {
        $businessTransactions = $repo->find($id);
        return $this->sendResponse($businessTransactions, __('messages.retrivied'));
    }

    /**
     * @OA\Get(
     *      path="/api/businessTransactions/stats",
     *      summary="Stats transaction data",
     *      tags={"Business Transactions"},
     *      description="Stats transaction",
     *      security={{"bearer":{}}},
     *      @OA\Parameter(
     *          name="date_started",
     *          @OA\Schema(
     *            type="stirng"
     *          ),
     *          in="query"
     *      ),
     *      @OA\Parameter(
     *          name="date_ended",
     *          @OA\Schema(
     *            type="stirng"
     *          ),
     *          in="query"
     *      ),
     *      @OA\Parameter(
     *          name="province_id",
     *          @OA\Schema(
     *            type="integer"
     *          ),
     *          in="query"
     *      ),
     *      @OA\Parameter(
     *          name="city_id",
     *          @OA\Schema(
     *            type="integer"
     *          ),
     *          in="query"
     *      ),
     *      @OA\Parameter(
     *          name="district_id",
     *          @OA\Schema(
     *            type="integer"
     *          ),
     *          in="query"
     *      ),
     *      @OA\Parameter(
     *          name="village_id",
     *          @OA\Schema(
     *            type="integer"
     *          ),
     *          in="query"
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="successful get transaction item",
     *      )
     * )
     */
    public function stats(Request $request, BusinessTransactionRepository $repo)
    {
        $businessTransactions = $repo->stats($request->all());
        return $this->sendResponse($businessTransactions, __('messages.retrivied'));
    }

    /**
     * @OA\Get(
     *      path="/api/businessTransactions/{businessId}/business",
     *      summary="Get transaction data by business",
     *      tags={"Business Transactions"},
     *      description="Get transaction",
     *      security={{"bearer":{}}},
     *      @OA\Parameter(
     *          name="businessId",
     *          in="path",
     *          required=true,
     *          @OA\Schema(
     *              type="integer",
     *          )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="successful get transaction item",
     *      )
     * )
     */
    public function getByBusiness(int $businessId, BusinessTransactionRepository $repo)
    {
        $businessTransactions = $repo->getByBusiness($businessId);
        return $this->sendResponse($businessTransactions, __('messages.retrivied'));
    }

    /**
     * Create Transactions
     * @param CreateTransactionAPIRequest $request
     *
     * @OA\Post(
     *      path="/api/businessTransactions",
     *      summary="Post transaction data",
     *      tags={"Business Transactions"},
     *      description="Post Transactions",
     *      security={{"bearer":{}}},
     *
     *      @OA\RequestBody(
     *          @OA\JsonContent(ref="#/components/schemas/BusinessTransaction")
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
    public function create(CreateBusinessTransactionAPIRequest $request, BusinessTransactionRepository $repo)
    {
        $businessTransaction = $repo->create($request->all());
        return $this->sendResponse($businessTransaction, __('messages.retrivied'));
    }

    /**
     * Put Business Transaction
     * @param UpdateTransactionAPIRequest $request
     * @param int $id
     *
     * @OA\Put(
     *      path="/api/businessTransactions/{id}",
     *      summary="Put transaction data",
     *      tags={"Business Transactions"},
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
     *          @OA\JsonContent(ref="#/components/schemas/BusinessTransaction")
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
    public function update(UpdateBusinessTransactionAPIRequest $request, int $id, BusinessTransactionRepository $repo)
    {
        $businessTransaction = $repo->update($id, $request->all());
        return $this->sendResponse($businessTransaction, __('messages.retrivied'));
    }

    /**
     * @OA\Delete(
     *      path="/api/businessTransactions/{id}",
     *      summary="Delete transaction data",
     *      tags={"Business Transactions"},
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
    public function delete(DeleteBusinessTransactionAPIRequest $request, int $id, BusinessTransactionRepository $repo)
    {
        $businessTransaction = $repo->delete($id);
        return $this->sendResponse($businessTransaction, __('messages.retrivied'));
    }

}
