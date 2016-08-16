<?php

use \App\RechargeBalance;
use \App\Http\Controllers\AccountController;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ExampleTest extends TestCase
{
    /**
     * A basic functional test example.
     * @test
     * @return void
     */
    public function opening_balance_must_be_greater_than_ending_balance()
    {

        $recharge = new RechargeBalance();

        $this->assertTrue($recharge->opening_is_greater_than_the_ending_balance(10000, 3000));

    }

    public function recharge_investment_profit_is_two_point_five_percent(){

        

    }

    /**
     * @test
     *
     */

    public function gettingThePostData(){


        $data = [
                  'opening' => 10000,
                  'ending'  => 2000,
                  'operator_name' => 'grameen'
        ];

          //$this->call('POST', '/account', $data);
          //$this->assertResponseOk();

        //$account = new AccountController();

        $this->post('/account', $data)->see(1);

    }

}
