<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

/**
 * Seeder untuk kebutuhan db system
 */
class SystemSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            BusinessCategorySeeder::class,
            BusinessTransactionTypeSeeder::class,
            BusinessTransactionItemSeeder::class,
            CountrySeeder::class,
            ProvinceSeeder::class,
            CitySeeder::class,
            DistrictSeeder::class,
            VillageSeeder::class,
            TransactionTypeSeeder::class,

        ]);
    }
}
