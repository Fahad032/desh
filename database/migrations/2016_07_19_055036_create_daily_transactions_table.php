<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDailyTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('daily_transactions', function (Blueprint $table) {

            $table->increments('id');

            $table->date('transaction_date');

            $table->integer('recharge_balance_id')->unsigned();

            $table->foreign('recharge_balance_id')->references('id')->on('recharge_balances');

            $table->integer('mobile_cash_transaction_id')->unsigned();

            $table->foreign('mobile_cash_transaction_id')->references('id')->on('mobile_cash_transactions');

            $table->integer('billing_transaction_id')->unsigned();

            $table->foreign('billing_transaction_id')->references('id')->on('billing_transactions');

            $table->integer('commission_transaction_id')->unsigned();

            $table->foreign('commission_transaction_id')->references('id')->on('additional_and_commission_transactions');

            $table->integer('user_id')->unsigned();

            $table->foreign('user_id')->references('id')->on('users');

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
        Schema::drop('daily_transactions');
    }
}
