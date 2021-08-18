<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Cryptocurrency;
class CreateCryptocurrenciesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $cryptocurrencies = [
            [
                'id' => 1, 
                'name' => 'Bitcoin', 
                'price' => 200.85, 
                'date' => '2005-08-08', 
                'image' => 'test',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 2, 
                'name' => 'Ethereum', 
                'price' => 5860.85, 
                'date' => '2005-08-08', 
                'image' => 'test',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 3, 
                'name' => 'Ripple', 
                'price' => 5860.85, 
                'date' => '2005-08-08', 
                'image' => 'test',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 4, 
                'name' => 'Bitcoin Cash', 
                'price' => 5860.85, 
                'date' => '2005-08-08', 
                'image' => 'test',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 5, 
                'name' => 'Cardano', 
                'price' => 5860.85, 
                'date' => '2005-08-08', 
                'image' => 'test',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 6, 
                'name' => 'Litecoin', 
                'price' => 5860.85, 
                'date' => '2005-08-08', 
                'image' => 'test',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 7, 
                'name' => 'NEM', 
                'price' => 5860.85, 
                'date' => '2005-08-08', 
                'image' => 'test',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 8, 
                'name' => 'Stellar', 
                'price' => 5860.85, 
                'date' => '2005-08-08', 
                'image' => 'test',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 9, 
                'name' => 'IOTA', 
                'price' => 5860.85, 
                'date' => '2005-08-08', 
                'image' => 'test',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 10, 
                'name' => 'Dash', 
                'price' => 5860.85, 
                'date' => '2005-08-08', 
                'image' => 'test',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')],
        ];
        

        Cryptocurrency::insert($cryptocurrencies);
       
    }
}
