<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRechargeBalancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recharge_balances', function (Blueprint $table) {

            $table->increments('id');

            $table->integer('user_id')->unsigned();

            $table->foreign('user_id')->references('id')->on('users');

            $table->integer('operator_id')->unsigned();

            $table->foreign('operator_id')->references('id')->on('operators');

            $table->integer('opening_balance')->unsigned();

            $table->integer('ending_balance')->unsigned();

            $table->integer('investment')->unsigned();

            $table->float('profit');

            $table->float('total_recharge');
            
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
        Schema::drop('recharge_balances');
    }
}
