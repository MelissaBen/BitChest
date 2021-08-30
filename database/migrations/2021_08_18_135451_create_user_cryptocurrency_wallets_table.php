<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserCryptocurrencyWalletsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_cryptocurrency_wallets', function (Blueprint $table) {
            $table->engine = "InnoDB";
            $table->id();
            $table->integer('id_user');

            $table->float('total');
            $table->integer('id_cryptocurrency');
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
        Schema::dropIfExists('user_cryptocurrency_wallets');
    }
}
