<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
<<<<<<< HEAD
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

=======

use App\Models\UserCryptocurrencyWallet;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use DB;
>>>>>>> a5b0eccdcf43b8767e3e05aa5f8a6b0656d62a38
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
<<<<<<< HEAD
=======
        $wallets = [
            [
                'id_user' => 1, 
                'total' => 0,
                'id_cryptocurrency' => 1
            ],
            [
                'id_ser' => 1, 
                'total' => 0,
                'id_cryptocurrency' => 2
            ]
        ];
        

        DB::table('user_cryptocurrency_wallets')->insert($wallets);

        DB::table('users_wallets')->insert([
            'id_user' => 1,
            'solde' => 1000.00,
        ]);
>>>>>>> a5b0eccdcf43b8767e3e05aa5f8a6b0656d62a38
    }
}
