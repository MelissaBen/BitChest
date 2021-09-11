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
        $this->call(CreateRolesSeeder::class);
        $this->call(CreateCryptocurrenciesSeeder::class);
        $this->call(CreateCustomerUserSeeder::class);
        $this->call(CreateAdminUserSeeder::class);
        $this->call(CreateCryptocurrenciesRateSeeder::class);
    }
}
