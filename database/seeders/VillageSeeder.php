<?php

namespace Database\Seeders;

use App\Models\City;
use App\Models\Village;
use Illuminate\Database\Seeder;

class VillageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Village::truncate();

        $path = 'database/seeders/json/kelurahan.json';
        $file = file_get_contents($path);
        $datas = json_decode($file, true);

        foreach($datas as $data){
            Village::create([
                'id' => $data['id'],
                'code' => $data['code'],
                'full_code' => $data['full_code'],
                'district_id' => $data['kecamatan_id'],
                'pos_code' => $data['pos_code'],
                'name' => $data['name']
            ]);
        }
    }
}
