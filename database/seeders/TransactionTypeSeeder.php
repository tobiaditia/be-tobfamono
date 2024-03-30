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
                'id-ID' => 'Petani',
                'en-US' => 'Farmer'
            ],
            [
                'id' => 2,
                'id-ID' => 'Pengepul',
                'en-US' => 'Pengepul'
            ]
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
