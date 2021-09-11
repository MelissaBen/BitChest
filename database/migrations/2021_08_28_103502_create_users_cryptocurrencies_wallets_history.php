<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersCryptocurrenciesWalletsHistory extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_cryptocurrencies_wallets_history', function (Blueprint $table) {
            $table->id();
            $table->integer('id_user');
            $table->integer('id_wallet');
            $table->float('total');
            $table->float('gain',20,8);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users_cryptocurrencies_wallets_history');
    }
}
