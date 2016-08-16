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
use App\RechargeBalance;
use App\MobileCashTransaction;

use Carbon\Carbon;

use Illuminate\Http\Request;

use App\Http\Requests;

class ReportController extends Controller
{

    protected $viewData;
    protected $date;


    public function __construct($date = '')
    {

           $this->middleware(['auth', 'isValidUser']);
        
           // $this->date = Carbon::today();

//        $this->date = Carbon::createFromFormat('Y-m-d:H', '2016-7-30:00');

//        $this->date = Carbon::yesterday();
//        $this->date = Carbon::today();

    }

    public function index(){

//        $this->date = Carbon::createFromFormat('Y-m-d:H', '2016-7-30:00');
        $this->date = Carbon::today();

        $data = $this->getRecords();

        $data['date'] = str_replace('00:00:00', '', $this->date);

        return view('Admin.app-pages.report')->with($data);


    }


    public function show($date){

        $formatDate =  $date;

        $carbonDate = Carbon::createFromFormat('m-d-Y', $formatDate);

        $this->date = str_replace('.000000','', $carbonDate->startOfDay());

        $data = $this->getRecords();

        $data['date'] = str_replace('00:00:00', '', $this->date);

        return view('Admin.app-pages.report')->with($data);

    }


    public function getRecords(){

        $this->viewData['recharge_balance'] = Operator::with(['recharge_balance' => function($query){

            $query->where(['created_at' => $this->date]);

        }])->get();

        /*
        $this->viewData['commission'] = AdditionalsAndCommission::with([

            'commission_transaction'=> function($query){

                $query->where(['created_at' => $this->date]);

            }])->get();
*/


        $this->viewData['commission'] = AdditionalAndCommissionTransaction::with('commission')->where(['created_at' => $this->date])->get();



        $this->viewData['product'] = Product::with([

            'purchase' => function($query){

                $query->where(['created_at' => $this->date]);

            },

            'sales_transaction' => function($query){

                $query->where(['created_at' => $this->date]);


            }

        ])->get();

        $this->viewData['mobile_cash'] = MobileCashTransaction::with('mobile_cash')->where(['created_at' => $this->date])->get();

        $this->viewData['bills'] = BillingTransaction::with('bill')->where(['created_at' => $this->date])->get();


        return $this->viewData;


    }
}
