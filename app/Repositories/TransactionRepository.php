<?php

namespace App\Repositories;

use App\Models\Attachment;
use App\Models\Transaction;
use Illuminate\Support\Facades\Storage;

class TransactionRepository
{
    /**
     *
     * @return array
     */
    public function get(): array
    {
        return Transaction::with('user','businessCategory','attachments')->get()->toArray();
    }

    /**
     *
     * @param int $id
     * @return array
     */
    public function find(int $id): array
    {
        return Transaction::with('user','businessCategory','attachments')->find($id)->toArray();
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

        if (isset($request['attachment'])) {

            $base64Attachment = $request['attachment'];
            $decodedAttachment = base64_decode($base64Attachment);

            // Generate a unique file name
            $fileName = uniqid() . '.jpg'; // or any other extension based on the attachment type

            $filePath = 'transactions/' . $fileName;
            Storage::disk('public')->put($filePath, $decodedAttachment);

            $attachment = new Attachment();
            $attachment->type_id = Attachment::TYPE_TRANSACTION;
            $attachment->source_id = $transaction->id;
            $attachment->name = $filePath;
            $attachment->save();
        }

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
