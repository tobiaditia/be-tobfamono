<?php

namespace Database\Seeders;

use App\Models\BusinessCategory;
use Illuminate\Database\Seeder;

class BusinessCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        BusinessCategory::truncate();

        $datas = [
            [
                'id' => 1,
                'id-ID' => 'Ikan Lele',
                'en-US' => 'Catfish'
            ],
            [
                'id' => 2,
                'id-ID' => 'Ikan Gurame',
                'en-US' => 'Gurame'
            ],
        ];

        foreach($datas as $data){
            BusinessCategory::create([
                'id' => $data['id'],
                'name' => [
                    'id-ID' => $data['id-ID'],
                    'en-US' => $data['en-US']
                ]
            ]);
        }
    }
}
