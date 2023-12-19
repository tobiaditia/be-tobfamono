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
            TransactionTypeSeeder::class,
            TransactionItemSeeder::class,

        ]);
    }
}
