<?php

namespace App\Repositories;

use App\Models\Transaction;

class TransactionRepository
{
    /**
     *
     * @return array
     */
    public function get(): array
    {
        return Transaction::get()->toArray();
    }

    /**
     *
     * @param int $id
     * @return array
     */
    public function find(int $id): array
    {
        return Transaction::find($id)->toArray();
    }

    /**
     *
     * @param array $request
     * @return array
     */
    public function create(array $request): array
    {
        $transaction = new Transaction();
        $transaction->business_id = $request['business_id'];
        $transaction->transaction_type_id = $request['transaction_type_id'];
        $transaction->transaction_item_id = $request['transaction_item_id'];
        $transaction->total = $request['total'] ?? 0;
        $transaction->multiplier = $request['multiplier'] ?? 1;
        $transaction->save();

        return $this->find($transaction->id);
    }

    /**
     *
     * @param int $id
     * @param array $request
     * @return array
     */
    public function update(int $id, array $request): array
    {
        $transaction = Transaction::find($id);
        $transaction->business_id = $request['business_id'];
        $transaction->transaction_type_id = $request['transaction_type_id'];
        $transaction->transaction_item_id = $request['transaction_item_id'];
        $transaction->total = $request['total'] ?? 0;
        $transaction->multiplier = $request['multiplier'] ?? 1;
        $transaction->save();

        return $this->find($transaction->id);
    }

    /**
     * @param int $id
     */
    public function delete(int $id): bool
    {
        return Transaction::where('id', $id)->delete();
    }

}
