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
<<<<<<< HEAD
                'price' => 200.85, 
                'image' => 'test',
=======
                'image' => 'bitcoin',
>>>>>>> a5b0eccdcf43b8767e3e05aa5f8a6b0656d62a38
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 2, 
                'name' => 'Ethereum', 
<<<<<<< HEAD
                'price' => 5860.85, 
                'image' => 'test',
=======
                'image' => 'ethereum',
>>>>>>> a5b0eccdcf43b8767e3e05aa5f8a6b0656d62a38
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 3, 
                'name' => 'Ripple', 
<<<<<<< HEAD
                'price' => 5860.85, 
                'image' => 'test',
=======
                'image' => 'ripple',
>>>>>>> a5b0eccdcf43b8767e3e05aa5f8a6b0656d62a38
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 4, 
<<<<<<< HEAD
                'name' => 'Bitcoin Cash', 
                'price' => 5860.85, 
                'image' => 'test',
=======
                'name' => 'Bitcoin Cash',
                'image' => 'bitcoin-cash',
>>>>>>> a5b0eccdcf43b8767e3e05aa5f8a6b0656d62a38
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 5, 
                'name' => 'Cardano', 
<<<<<<< HEAD
                'price' => 5860.85, 
                'image' => 'test',
=======
                'image' => 'cardano',
>>>>>>> a5b0eccdcf43b8767e3e05aa5f8a6b0656d62a38
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 6, 
                'name' => 'Litecoin', 
<<<<<<< HEAD
                'price' => 5860.85, 
                'image' => 'test',
=======
                'image' => 'litecoin',
>>>>>>> a5b0eccdcf43b8767e3e05aa5f8a6b0656d62a38
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 7, 
                'name' => 'NEM', 
<<<<<<< HEAD
                'price' => 5860.85, 
                'image' => 'test',
=======
                'image' => 'nem',
>>>>>>> a5b0eccdcf43b8767e3e05aa5f8a6b0656d62a38
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 8, 
                'name' => 'Stellar', 
<<<<<<< HEAD
                'price' => 5860.85, 
                'image' => 'test',
=======
                'image' => 'stellar',
>>>>>>> a5b0eccdcf43b8767e3e05aa5f8a6b0656d62a38
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 9, 
                'name' => 'IOTA', 
<<<<<<< HEAD
                'price' => 5860.85, 
                'image' => 'test',
=======
                'image' => 'iota',
>>>>>>> a5b0eccdcf43b8767e3e05aa5f8a6b0656d62a38
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 10, 
                'name' => 'Dash', 
<<<<<<< HEAD
                'price' => 5860.85,  
                'image' => 'test',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')],
=======
                'image' => 'dash',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]
>>>>>>> a5b0eccdcf43b8767e3e05aa5f8a6b0656d62a38
        ];
        

        Cryptocurrency::insert($cryptocurrencies);
       
    }
}
