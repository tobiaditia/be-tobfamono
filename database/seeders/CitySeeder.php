<?php

namespace Database\Seeders;

use App\Models\City;
use Illuminate\Database\Seeder;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        City::truncate();

        $path = 'database/seeders/json/kabupaten.json';
        $file = file_get_contents($path);
        $datas = json_decode($file, true);

        foreach($datas as $data){
            City::create([
                'id' => $data['id'],
                'type' => $data['type'] == 'Kota' ? 1 : 2,
                'code' => $data['code'],
                'full_code' => $data['full_code'],
                'province_id' => $data['provinsi_id'],
                'name' => $data['name']
            ]);
        }
    }
}
