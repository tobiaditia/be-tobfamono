<?php

namespace App\Repositories;

use App\Models\BusinessTransaction;

class BusinessTransactionRepository
{
    /**
     *
     * @return array
     */
    public function get(): array
    {
        return BusinessTransaction::get()->toArray();
    }

    /**
     *
     * @return array
     */
    public function getByBusiness(int $businessId): array
    {
        return BusinessTransaction::where('business_id', $businessId)->get()->toArray();
    }

    /**
     *
     * @param int $id
     * @return array
     */
    public function find(int $id): array
    {
        return BusinessTransaction::find($id)->toArray();
    }

    /**
     *
     * @param array $request
     * @return array
     */
    public function create(array $request): array
    {
        $businessTransaction = new BusinessTransaction();
        $businessTransaction->business_id = $request['business_id'];
        $businessTransaction->business_transaction_type_id = $request['business_transaction_type_id'];
        $businessTransaction->business_transaction_item_id = $request['business_transaction_item_id'];
        $businessTransaction->total = $request['total'] ?? 0;
        $businessTransaction->multiplier = $request['multiplier'] ?? 1;
        $businessTransaction->date = $request['date'] ?? now()->toDateString();
        $businessTransaction->save();

        return $this->find($businessTransaction->id);
    }

    /**
     *
     * @param int $id
     * @param array $request
     * @return array
     */
    public function update(int $id, array $request): array
    {
        $businessTransaction = BusinessTransaction::find($id);
        $businessTransaction->business_id = $request['business_id'];
        $businessTransaction->business_transaction_type_id = $request['business_transaction_type_id'];
        $businessTransaction->business_transaction_item_id = $request['business_transaction_item_id'];
        $businessTransaction->total = $request['total'] ?? 0;
        $businessTransaction->multiplier = $request['multiplier'] ?? 1;
        $businessTransaction->date = $request['date'] ?? now()->toDateString();
        $businessTransaction->save();

        return $this->find($businessTransaction->id);
    }

    /**
     * @param int $id
     */
    public function delete(int $id): bool
    {
        return BusinessTransaction::where('id', $id)->delete();
    }

}
