<?php

namespace Database\Seeders;

use App\Models\TransactionType;
use Illuminate\Database\Seeder;

class TransactionTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TransactionType::truncate();

        $datas = [
            [
                'id' => 1,
                'id-ID' => 'Beli',
                'en-US' => 'Buy'
            ],
            [
                'id' => 2,
                'id-ID' => 'Jual',
                'en-US' => 'Sell'
            ],
        ];

        foreach($datas as $data){
            TransactionType::create([
                'id' => $data['id'],
                'name' => [
                    'id-ID' => $data['id-ID'],
                    'en-US' => $data['en-US']
                ]
            ]);
        }
    }
}
