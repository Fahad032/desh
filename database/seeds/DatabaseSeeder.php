<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        //Model::ungurad();

        $user = App\User::create(['name'=>'Fahad', 'email'=>'fhdplsh032@gmail.com', 'password'=>bcrypt('member')]);

        App\Operator::insert([

            ['name' => 'grameen', 'created_at' => Carbon::today(), 'updated_at'=> Carbon::now()],
            ['name' => 'banglalink','created_at' => Carbon::today(), 'updated_at'=> Carbon::now()],
            ['name' => 'airtel', 'created_at' => Carbon::today(), 'updated_at'=> Carbon::now()],
            ['name' => 'grameen_2', 'created_at' => Carbon::today(), 'updated_at'=> Carbon::now()],
            ['name' => 'banglalink_2', 'created_at' => Carbon::today(), 'updated_at'=> Carbon::now()],
            ['name' => 'airtel_2', 'created_at' => Carbon::today(), 'updated_at'=> Carbon::now()],
            ['name' => 'robi', 'created_at' => Carbon::today(), 'updated_at'=> Carbon::now()],
            ['name' => 'alap', 'created_at' => Carbon::today(), 'updated_at'=> Carbon::now()],
            ['name' => 'teletalk', 'created_at' => Carbon::today(), 'updated_at'=> Carbon::now()]


        ]);
       /*
        App\RechargeBalance::insert([

            ['investment'=> 5000, 'operator_name' => 'grameen', 'user_id' => 1, 'created_at' => Carbon::today(), 'updated_at'=> Carbon::now()],
            ['investment'=> 5000, 'operator_name' => 'banglalink',  'user_id' => 1, 'created_at' => Carbon::today(), 'updated_at'=> Carbon::now()],
            ['investment'=> 2000, 'operator_name' => 'airtel',  'user_id' => 1, 'created_at' => Carbon::today(), 'updated_at'=> Carbon::now()],
            ['investment'=> 2000, 'operator_name' => 'grameen_2',  'user_id' => 1, 'created_at' => Carbon::today(), 'updated_at'=> Carbon::now()],
            ['investment'=> 2000, 'operator_name' => 'banglalink_2',  'user_id' => 1, 'created_at' => Carbon::today(), 'updated_at'=> Carbon::now()],
            ['investment'=> 1000, 'operator_name' => 'airtel_2',  'user_id' => 1, 'created_at' => Carbon::today(), 'updated_at'=> Carbon::now()],
            ['investment'=> 2000, 'operator_name' => 'robi',  'user_id' => 1, 'created_at' => Carbon::today(), 'updated_at'=> Carbon::now()],
            ['investment'=> 2000, 'operator_name' => 'alap',  'user_id' => 1, 'created_at' => Carbon::today(), 'updated_at'=> Carbon::now()],
            ['investment'=> 2000, 'operator_name' => 'teletalk',  'user_id' => 1, 'created_at' => Carbon::today(), 'updated_at'=> Carbon::now()]

        ]);
       */

        App\Billing::create(['bill_name' => 'Wasa']);
        App\Billing::create(['bill_name' => 'Advance Bill']);

        App\Product::create(['item_name' => 'Cards']);
        App\product::create(['item_name' => 'Other Products']);
        App\product::create(['item_name' => 'Due']);

        App\MobileCash::create(['operator_name' => 'Mobicash']);
        App\MobileCash::create(['operator_name' => 'Telecash']);
        App\MobileCash::create(['operator_name' => 'Bkash']);

        App\AdditionalsAndCommission::create(['additional_field_name' => 'One Taka']);
        App\AdditionalsAndCommission::create(['additional_field_name' => 'Company Commission']);
        App\AdditionalsAndCommission::create(['additional_field_name' => 'Mobi Cash Commission']);
        App\AdditionalsAndCommission::create(['additional_field_name' => 'Due Get']);


        //Model::reguard();
    }
}
