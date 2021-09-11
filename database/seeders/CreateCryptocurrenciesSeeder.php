<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Admin\Cryptocurrency;
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
                'image' => 'bitcoin.png',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 2, 
                'name' => 'Ethereum', 
                'image' => 'ethereum.png',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 3, 
                'name' => 'Ripple', 
                'image' => 'ripple.png',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 4, 
                'name' => 'Bitcoin-Cash',
                'image' => 'bitcoin-cash.png',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 5, 
                'name' => 'Cardano', 
                'image' => 'cardano.png',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 6, 
                'name' => 'Litecoin', 
                'image' => 'litecoin.png',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 7, 
                'name' => 'NEM', 
                'image' => 'nem.png',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 8, 
                'name' => 'Stellar', 
                'image' => 'stellar.png',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 9, 
                'name' => 'IOTA', 
                'image' => 'iota.png',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 10, 
                'name' => 'Dash', 
                'image' => 'dash.png',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]
        ];
        

        Cryptocurrency::insert($cryptocurrencies);
       
    }
}
