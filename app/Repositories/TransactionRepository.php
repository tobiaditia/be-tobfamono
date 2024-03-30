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
        $transaction->user_id = $request['user_id'];
        $transaction->address = $request['address'];
        $transaction->date = $request['date'] ?? now()->toDateString();
        $transaction->description = $request['description'];
        $transaction->transaction_type_id = $request['transaction_type_id'];
        $transaction->business_category_id = $request['business_category_id'];
        $transaction->price = $request['price'] ?? 0;
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
        $transaction->user_id = $request['user_id'];
        $transaction->address = $request['address'];
        $transaction->date = $request['date'] ?? now()->toDateString();
        $transaction->description = $request['description'];
        $transaction->transaction_type_id = $request['transaction_type_id'];
        $transaction->business_category_id = $request['business_category_id'];
        $transaction->price = $request['price'] ?? 0;
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
