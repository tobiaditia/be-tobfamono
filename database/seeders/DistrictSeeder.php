<?php

namespace Database\Seeders;

use App\Models\City;
use App\Models\District;
use Illuminate\Database\Seeder;

class DistrictSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        District::truncate();

        $path = 'database/seeders/json/kecamatan.json';
        $file = file_get_contents($path);
        $datas = json_decode($file, true);

        foreach($datas as $data){
            District::create([
                'id' => $data['id'],
                'code' => $data['code'],
                'full_code' => $data['full_code'],
                'city_id' => $data['kabupaten_id'],
                'name' => $data['name']
            ]);
        }
    }
}
