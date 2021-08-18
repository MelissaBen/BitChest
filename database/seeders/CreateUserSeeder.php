<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class CreateUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'firstname' => 'Alexis', 
            'lastname' => 'Fauchere',
            'email' => 'alexis.fauchere@gmail.com',
            'password' => bcrypt('12345678')
        ]);
        $user->assignRole(2);
    }
}
