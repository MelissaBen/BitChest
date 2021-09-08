<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Admin\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class CreateAdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'firstname' => 'admin', 
            'lastname' => 'bitchest',
            'email' => 'adminbitchest@gmail.com',
            'role_id' => 1,
            'password' => bcrypt('12345678')
        ]);

        $user->assignRole(1);
    }
}
