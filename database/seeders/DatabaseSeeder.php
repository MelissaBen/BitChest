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
<<<<<<< HEAD
=======
        $this->call(CurrenciesRateSeeder::class);
>>>>>>> a5b0eccdcf43b8767e3e05aa5f8a6b0656d62a38
    }
}
