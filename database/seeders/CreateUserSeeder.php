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
            'firstname' => 'John', 
            'lastname' => 'Doe',
            'email' => 'john.doe@gmail.com',
            'role_id' => 2,
            'password' => bcrypt('12345678')
        ]);
        $user->assignRole(2);
    }
}
