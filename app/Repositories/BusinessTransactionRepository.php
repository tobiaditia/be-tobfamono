<?php

namespace App\Repositories;

use App\Models\Attachment;
use App\Models\Business;
use App\Models\BusinessCategory;
use App\Models\BusinessTransaction;
use App\Models\BusinessTransactionItem;
use App\Models\BusinessTransactionType;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

class BusinessTransactionRepository
{
    /**
     *
     * @return array
     */
    public function get(): array
    {
        return BusinessTransaction::with('businessTransactionItem', 'attachments')->get()->toArray();
    }

    /**
     *
     * @return array
     */
    public function stats(array $input): array
    {
        $dateStarted = $input['date_started'] ?? Carbon::now()->firstOfYear()->format('Y-m-d');
        $dateEnded = $input['date_ended'] ?? Carbon::now()->endOfYear()->format('Y-m-d');
        $provinceId = $input['province_id'] ?? 0;
        $cityId = $input['city_id'] ?? 0;
        $districtId = $input['district_id'] ?? 0;
        $villageId = $input['village_id'] ?? 0;
        $businessCategories = BusinessCategory::where('id', BusinessCategory::GURAME)->get(); 

        $a = [];
        foreach ($businessCategories as $businessCategory) {
            $businessTrans = BusinessTransaction::
                whereBetween('date', [$dateStarted, $dateEnded])
                ->where('business_transaction_item_id', BusinessTransactionItem::HASIL_USAHA)
                ->where('business_transaction_type_id', BusinessTransactionType::SELL)
                ->whereHas('business', function ($query) use ($businessCategory, $provinceId, $cityId , $districtId , $villageId) {
                    $query->where('business_category_id', $businessCategory->id)
                    ->when($provinceId != 0, function ($business) use ($provinceId) {
                        $business->where('province_id', $provinceId);
                    })
                    ->when($cityId != 0, function ($business) use ($cityId) {
                        $business->where('city_id', $cityId);
                    })
                    ->when($districtId != 0, function ($business) use ($districtId) {
                        $business->where('district_id', $districtId);
                    })
                    ->when($villageId != 0, function ($business) use ($villageId) {
                        $business->where('village_id', $villageId);
                    })
                    ;
                })
                ->get()
            ;

            $avg = 0;
            $totalAmountTrans = 0;
            $total = 0;
            $group = [];
            $results = [];
            foreach ($businessTrans as $businessTran) {
                if(empty($group[$businessTran->date])){
                    $group[$businessTran->date] = $businessTran->total;
                }else{
                    $group[$businessTran->date] = $group[$businessTran->date] + $businessTran->total;
                }

                $totalAmountTrans += 1;
                $total += $businessTran->total;
            }

            if($totalAmountTrans > 0){
                $avg = $total / $totalAmountTrans;
            }

            foreach ($group as $date => $value) {
                $results[] = [
                    'date' => $date,
                    'total' => $value
                ];
            }

            $a[] = [
                'business_category' => [
                    'id' => $businessCategory->id,
                    'name' => $businessCategory->name,
                ],
                'avg' => round($avg, 2),
                'stats' => (array)$results,
            ];
        }

        return $a;
    }

    /**
     *
     * @return array
     */
    public function getByBusiness(int $businessId): array
    {
        return BusinessTransaction::with('businessTransactionItem')->where('business_id', $businessId)->get()->toArray();
    }

    /**
     *
     * @param int $id
     * @return array
     */
    public function find(int $id): array
    {
        return BusinessTransaction::with('businessTransactionItem')->find($id)->toArray();
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
        $businessTransaction->description = $request['description'] ?? '';
        $businessTransaction->save();

        if (isset($request['attachment'])) {

            $base64Attachment = $request['attachment'];
            $decodedAttachment = base64_decode($base64Attachment);

            // Generate a unique file name
            $fileName = uniqid() . '.jpg'; // or any other extension based on the attachment type

            // Store the decoded file in the desired location
            $filePath = 'business_transactions/' . $fileName;
            Storage::disk('public')->put($filePath, $decodedAttachment);

            // Create the attachment entry in the database
            $attachment = new Attachment();
            $attachment->type_id = Attachment::TYPE_BUSINESS_TRANSACTION;
            $attachment->source_id = $businessTransaction->id;
            $attachment->name = $filePath;
            $attachment->save();

        }

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
        $businessTransaction->description = $request['description'];
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
