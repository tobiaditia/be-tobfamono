<?php

namespace Database\Seeders;

use App\Models\Province;
use Illuminate\Database\Seeder;

class ProvinceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Province::truncate();
        
        $path = 'database/seeders/json/provinsi.json';
        $file = file_get_contents($path);
        $datas = json_decode($file, true);

        foreach($datas as $data){
            Province::create([
                'id' => $data['id'],
                'code' => $data['code'],
                'name' => $data['name']
            ]);
        }
    }
}
