<?php

namespace App\Http\Controllers;

use App\AdditionalAndCommissionTransaction;
use App\AdditionalsAndCommission;
use App\Billing;
use App\BillingTransaction;
use App\MobileCash;
use App\Operator;
use App\Product;
use App\Purchase;
use App\SalesTransaction;

use Carbon\Carbon;
use Illuminate\Http\Request;
use \App\RechargeBalance;
use \App\MobileCashTransaction;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{

    const RECHARGE_PROFIT_RATE = 2.75;

    const MOBICASH_INCOMING_PROFIT_RATE = 5;

    const BKASH_INCOMING_PROFIT_RATE = 4.2;

    const TELECASH_INCOMING_PROFIT_RATE = 4.2;

    protected $user_id = 1;

    protected $viewData = [];

    protected $date;

    public function __construct(){

        $this->middleware(['auth', 'isValidUser']);

    }

    public function index(){

        //$this->date = Carbon::createFromFormat('Y-m-d:H', '2016-7-30:00');

        $this->date = Carbon::today();

        $this->viewData['date'] = $this->date->parse()->format('d-m-Y');

        $this->viewData['recharge_balance'] = Operator::with(['recharge_balance' => function($query){

            $query->where(['created_at' => $this->date]);

        }])->get();

        $this->viewData['commission'] = AdditionalsAndCommission::with([

            'commission_transaction'=> function($query){

                $query->where(['created_at' => $this->date]);

            }])->get();
        

        $this->viewData['product'] = Product::with([

            'purchase' => function($query){

                $query->where(['created_at' => $this->date]);

            },

            'sales_transaction' => function($query){

                $query->where(['created_at' => $this->date]);


            }

        ])->get();
        
        $this->viewData['mobile_cash'] = MobileCashTransaction::where(['created_at' => $this->date])->get();

        $this->viewData['bills'] = BillingTransaction::where(['created_at' => $this->date])->get();


        return view('Admin.app-pages.index')->with($this->viewData);

    }


    // Show method, leaving it blank now
    public function show($date){

        \Session::flash('message', 'Under development, Please leave it for the time being');
        return redirect()->to('/');

    }


    public function store(Request $request){

       // $this->date = $request->date;
       // will activate later on if we require to edit the previous report

        $operators = new Operator();

        $mobile_cashes = new MobileCash();

        $product = new Product();

        $rechargeBalance = new RechargeBalance();

        if($request->input('investment')){


            // Recharge Balance Investments


              $viewData['recharge_investment'] = $this->recharge_balance_investment($request, $operators);


            // Mobile Cash Transactions Investment

                $viewData['mobile_cash_investment'] = $this->mobile_cash_investment($request, $mobile_cashes);


            //Purchase Investment

                $viewData['purchase'] =  $this->purchase_investment($request, $product);

            return $viewData;

        }


        // Persisting Opening And Ending Balances

        if($request->operator_id){


            if($viewData['recharge_record'] = $this->persist_operator_opening_ending($request, $rechargeBalance)){

                return $viewData;

            }

            return abort(403, "Please Be sure to invest first");

        }


        //Mobile Cash Transactions Outgoing

        if($request->input('mobile_cash_transactions')){


            $mobileCash =  new MobileCashTransaction();

            $mobile_cash_record = $mobileCash->whereIn('mobile_cash_id',  [1,2,3])
                                             ->where(['created_at' => Carbon::today()])
                                             ->take(3)
                                             ->get();


            $fields = [
                $request->input('mobicash'),
                $request->input('telecash'),
                $request->input('bkash'),
            ];


            foreach($mobile_cash_record as $index => $record){

                $record->outgoing = $fields[$index];
                $record->outgoing_profit = 0;
                $record->total_profit = $this->mobicash_total_profit($record->incoming_profit, $record->outgoing_profit);
                $record->save();


            }

            return $mobileCash->whereIn('mobile_cash_id',  [1,2,3])->where(['created_at' => Carbon::today()])->get();

        }


        //Commission Calculation

        if($request->input('commission_calculation')){

            $commission = new AdditionalsAndCommission();

            // taking first 3 records from the table

            $commission_fields = $commission->take(3)->get();

            $commission_amount = [

                $request->one_taka,
                $request->company_commission,
                $request->mobi_cash_commission

            ];

            foreach($commission_fields as $single_field){

                $commission_transaction_record = $single_field->commission_transaction()->firstOrCreate(

                    ['user_id' => $this->user_id,'created_at' => Carbon::today()]

                );

                $commission_transaction_record->amount = $commission_amount[ ($single_field->id - 1) ];

                $commission_transaction_record->created_at = Carbon::today();

                $commission_transaction_record->save();


            }


            return AdditionalAndCommissionTransaction::where(['created_at' => Carbon::today()])->get();


        }


        // Sales Transactions

        if($request->input('cards_sell')){

            $products = $product->take(2)->get();

            $sells_amount = [

                $request->cards_sell,
                $request->other_products
            ];

            foreach($products as $item){

                $sales_record = $item->sales_transaction()->firstOrCreate(

                    ['user_id' => $this->user_id, 'created_at' => Carbon::today()]

                );

                $sales_record->sells_amount = $sells_amount[($item->id - 1)];

                $sales_record->created_at = Carbon::today();

                $sales_record->save();

            }

            return SalesTransaction::where('created_at', Carbon::today())->get();



        }

        //Additional Transactions

        if($request->input('due_get')){

            $item =  $product->find(3);

            $due_get_record = $item->sales_transaction()->firstOrCreate(

                ['user_id' => $this->user_id, 'created_at' => Carbon::today()]

            );

            $due_get_record->sells_amount = $request->due_get;

            $due_get_record->created_at = Carbon::today();

            $due_get_record->save();

/*
            $due_get_record = AdditionalAndCommissionTransaction::firstOrCreate([
                                                     'user_id' => $this->user_id,
                                                     'commission_id' => 4,
                                                     'created_at' => Carbon::today(),
                                                ]);

            $due_get_record->amount = $request->due_get;

            $due_get_record->created_at = Carbon::today();

            $due_get_record->save();

*/


          return SalesTransaction::where(['product_id' => 3, 'created_at' => Carbon::today()])->get();

        }

        //Billings

        if($request->input('bills')){

            $bills = [
                $request->input('wasa_bill'),
                $request->input('advance_bill')
            ];

            $billing = new Billing();

            $billList = $billing->get();

            foreach($billList as $bill){

                $bill_record = $bill->billing_transaction()->firstOrCreate(

                    ['user_id' => $this->user_id, 'created_at' => Carbon::today()]

                );

                $bill_record->amount = $bills[($bill->id - 1)];

                $bill_record->created_at = Carbon::today();

                $bill_record->save();

            }

            return BillingTransaction::where(['created_at' => Carbon::today()])->get();

        }



        $fetched = $rechargeBalance->where(['created_at'=>carbon::today()])->get();

        return $fetched;

    }



    public function rechargeProfit($investment)
    {

        return ($investment * self::RECHARGE_PROFIT_RATE)/100;

    }

    public function incoming_profit($incoming_amount, $mobicash_id)
    {

        $rate = [

            1 => self::MOBICASH_INCOMING_PROFIT_RATE,
            2 => self::BKASH_INCOMING_PROFIT_RATE,
            3 => self::TELECASH_INCOMING_PROFIT_RATE

        ];

        return ($incoming_amount * $rate[$mobicash_id])/100;

    }

    public function mobicash_total_profit($incoming_profit, $outging_profit)
    {

        return ( $incoming_profit + $outging_profit );

    }


    public function recharge_balance_investment($request, $operators)
    {


        $operator_collections = $operators->get();

        $investments = [
            $request->grameen_investment,
            $request->banglalink_investment,
            $request->airtel_investment,
            $request->grameen_2_investment,
            $request->banglalink_2_investment,
            $request->airtel_2_investment,
            $request->robi_investment,
            $request->alap_investment,
            $request->teletalk_investment,
        ];

        foreach ($operator_collections as $single_operator) {

            $recharge = $single_operator->recharge_balance()
                ->firstOrCreate([
                    'user_id' => $this->user_id,
                    'created_at' => Carbon::today()
                ]);

            $recharge->investment = $investments[($single_operator->id - 1)];
            $recharge->profit = $this->rechargeProfit($investments[($single_operator->id - 1)]);
            $recharge->created_at = Carbon::today();
            $recharge->save();

        }

        return $operators->with('recharge_balance')->get();

    }


    public function mobile_cash_investment($request, $mobile_cashes)
    {

        $mobile_cash_operators = $mobile_cashes->get();

            $mblcash_investments = [
                $request->mobicash_investment,
                $request->bkash_investment,
                $request->telecash_investment
            ];

            $mblcash_incoming = [
                $request->mobicash_incoming,
                $request->bkash_incoming,
                $request->telecash_incoming
            ];


            foreach($mobile_cash_operators as $single_cash_operator){

                $record = $single_cash_operator->mobileCash_transaction()->firstOrCreate(

                    ['user_id'=> $this->user_id, 'created_at' => Carbon::today()]

                );


                $record->investment =  $mblcash_investments[($single_cash_operator->id-1)];

                $record->incoming = $mblcash_incoming[($single_cash_operator->id -1)];

                $record->incoming_profit = $this->incoming_profit($record->incoming, $single_cash_operator->id);

                $record->created_at = Carbon::today();

                $record->save();

            }

            return $mobile_cashes->with('mobileCash_transaction')->get();

    }



    public function purchase_investment($request, $product)
    {

        $productsList = $product->get();

        $amount = [
            $request->card_purchase,
            $request->product_purchase,
            $request->due_investment
        ];


        foreach($productsList as $item ){

            $itemRecord = $item->purchase()->firstOrCreate(

                ['user_id'=>$this->user_id, 'created_at' => Carbon::today()]

            );

            $itemRecord->purchase_amount = $amount[($item->id - 1)];
            $itemRecord->created_at = Carbon::today();
            $itemRecord->save();


        }

        return $product->with('purchase')->get();

    }


    public function persist_operator_opening_ending($request, $rechargeBalance)
    {

        $rechargeRecord = $rechargeBalance->where(['operator_id' => $request->operator_id, 'created_at' => Carbon::today()])->first();

            if($rechargeRecord){

                $rechargeRecord->opening_balance = $request->opening_balance;

                $rechargeRecord->ending_balance = $request->ending_balance;

                $rechargeRecord->total_recharge = (int)(($request->opening_balance + $rechargeRecord->investment + $rechargeRecord->profit ) - $request->ending_balance);

                $rechargeRecord->save();

            }

        return $rechargeBalance->where(['created_at' => Carbon::today()])->get();

    }





}// end of the class
