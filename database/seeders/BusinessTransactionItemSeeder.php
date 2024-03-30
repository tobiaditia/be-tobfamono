<?php

namespace Database\Seeders;

use App\Models\BusinessTransactionItem;
use Illuminate\Database\Seeder;

class BusinessTransactionItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        BusinessTransactionItem::truncate();

        $datas = [
            [
                'id' => 1,
                'id-ID' => 'Hasil Usaha',
                'en-US' => 'Company Result'
            ],
            [
                'id' => 2,
                'id-ID' => 'Pakan',
                'en-US' => 'Feed'
            ],
            [
                'id' => 3,
                'id-ID' => 'Listrik',
                'en-US' => 'Electricity'
            ],
        ];

        foreach($datas as $data){
            BusinessTransactionItem::create([
                'id' => $data['id'],
                'name' => [
                    'id-ID' => $data['id-ID'],
                    'en-US' => $data['en-US']
                ]
            ]);
        }
    }
}
