<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMobileCashTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mobile_cash_transactions', function (Blueprint $table) {

            $table->increments('id');

            $table->integer('user_id')->unsigned();

            $table->foreign('user_id')->references('id')->on('users');

            $table->integer('mobile_cash_id')->unsigned();

            $table->foreign('mobile_cash_id')->references('id')->on('mobile_cashes');

            $table->integer('investment')->unsigned();

            $table->integer('incoming')->unsigned();

            $table->integer('outgoing')->unsigned();

            $table->float('incoming_profit');

            $table->float('outgoing_profit');

            $table->float('total_profit');

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
        Schema::drop('mobile_cash_transactions');
    }
}
