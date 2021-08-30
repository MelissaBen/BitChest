<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RolesTableSeeder::class);
        $this->call(CreateCryptocurrenciesSeeder::class);
        $this->call(CreateUserSeeder::class);
        $this->call(CreateAdminUserSeeder::class);
        $this->call(CurrenciesRateSeeder::class);
    }
}
