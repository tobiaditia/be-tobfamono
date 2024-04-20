<?php

namespace Database\Seeders;

use App\Models\BusinessCategory;
use App\Models\Country;
use Illuminate\Database\Seeder;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Country::truncate();

        $datas = [
            [
                'id' => 1,
                'name' => 'Indonesia'
            ],
        ];

        foreach($datas as $data){
            Country::create([
                'id' => $data['id'],
                'name' => $data['name']
            ]);
        }
    }
}
