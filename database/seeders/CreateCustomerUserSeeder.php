<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Admin\User;

use App\Models\Front\UserCryptocurrencyWallet;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use DB;
class CreateCustomerUserSeeder extends Seeder
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
        

        DB::table('user_cryptocurrencies_wallets')->insert($wallets);

        DB::table('users_wallets')->insert([
            'id_user' => 1,
            'solde' => 2000.00,
        ]);
    }
}
