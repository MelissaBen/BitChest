<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
use App\Models\Cryptocurrency;
class CreateCryptocurrencies extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cryptocurrencies')->delete();

        $users = [
            ['id' => 1, 'name' => 'Bitcoin', 'description' => 'test', 'price' => 200.85, 'date' => '2005-08-08', 'image' => 'test'],
            ['id' => 2, 'name' => 'Ethereum', 'description' => 'test', 'price' => 5860.85, 'date' => '2005-08-08', 'image' => 'test'],
            ['id' => 3, 'name' => 'Ripple', 'description' => 'test', 'price' => 5860.85, 'date' => '2005-08-08', 'image' => 'test'],
            ['id' => 4, 'name' => 'Bitcoin Cash', 'description' => 'test', 'price' => 5860.85, 'date' => '2005-08-08', 'image' => 'test'],
            ['id' => 5, 'name' => 'Cardano', 'description' => 'test', 'price' => 5860.85, 'date' => '2005-08-08', 'image' => 'test'],
            ['id' => 6, 'name' => 'Litecoin', 'description' => 'test', 'price' => 5860.85, 'date' => '2005-08-08', 'image' => 'test'],
            ['id' => 7, 'name' => 'NEM', 'description' => 'test', 'price' => 5860.85, 'date' => '2005-08-08', 'image' => 'test'],
            ['id' => 8, 'name' => 'Stellar', 'description' => 'test', 'price' => 5860.85, 'date' => '2005-08-08', 'image' => 'test'],
            ['id' => 9, 'name' => 'IOTA', 'description' => 'test', 'price' => 5860.85, 'date' => '2005-08-08', 'image' => 'test'],
            ['id' => 10, 'name' => 'Dash', 'description' => 'test', 'price' => 5860.85, 'date' => '2005-08-08', 'image' => 'test'],
        ];
    
        Cryptocurrency::insert($users);
    }
}
