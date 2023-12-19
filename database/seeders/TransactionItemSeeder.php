<?php

namespace Database\Seeders;

use App\Models\TransactionItem;
use Illuminate\Database\Seeder;

class TransactionItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TransactionItem::truncate();

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
            TransactionItem::create([
                'id' => $data['id'],
                'name' => [
                    'id-ID' => $data['id-ID'],
                    'en-US' => $data['en-US']
                ]
            ]);
        }
    }
}
