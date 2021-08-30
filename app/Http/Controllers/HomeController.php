<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cryptocurrency;
<<<<<<< HEAD
use DB;
use App\Models\Wallet;
=======

use DB;
use App\Models\UserCryptocurrencyWallet;
use Carbon\CarbonPeriod;
>>>>>>> a5b0eccdcf43b8767e3e05aa5f8a6b0656d62a38
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
<<<<<<< HEAD
    {     $year = ['2021','2016','2017'];
        $user = [];
        foreach ($year as $key => $value) {
            $user = DB::table('currencies')
            ->select(DB::raw('price'))
            ->pluck('price')->all();
        }
        
       
    	return view('chartjs')->with('year',json_encode($year,JSON_NUMERIC_CHECK))->with('user',json_encode($user,JSON_NUMERIC_CHECK));
        $cryptocurrencies = Cryptocurrency::all();
        $wallet = Wallet::where('id_user',2)->get();
    }
    
=======
    {   
        //Get cryptocurrencies
        $today = date('Y-m-d');
        $yesterday = date('Y-m-d',strtotime("-1 days"));
        $crypto = DB::table('cryptocurrencies as c')->join('currency_rates as cr', 'c.id', '=', 'cr.id_cryptocurrency')->where('cr.created_at', $today)->select(DB::raw('c.name'), 'c.id', 'cr.price', 'c.image')->get()->toArray();
        $yesterdayCrypto = DB::table('currency_rates')->where('created_at', $yesterday)->select('price')->get()->toArray();
      
        $cryptoRanks = DB::table('cryptocurrencies as c')->join('currency_rates as cr', 'c.id', '=', 'cr.id_cryptocurrency')->where('cr.created_at',$today)->select('c.name', 'c.image', 'cr.price')->orderBy('cr.price', 'desc')->get();
        

    	return view('home')->with('crypto',$crypto)->with('yesterdayCrypto',$yesterdayCrypto)->with('cryptoRanks',$cryptoRanks);
      
    }
    public function test($days,$id){
        foreach($days as $day){
            $test[] = DB::table('currency_rates')->where('created_at', $day)->where('id_cryptocurrency', $id)->value('price');
         }
         return $test;
    }

    public function jsontest(){
         //Get an array of days in current month
         $firstDayThisMonth = date('Y-m-01');
         $lastDayThisMonth = date("Y-m-t");
         $period = CarbonPeriod::between($firstDayThisMonth, $lastDayThisMonth);
         foreach ($period as $date) {
             $days[] = $date->format('Y-m-d');
         }
        
        $crypto = DB::table('cryptocurrencies')->select(DB::raw('name'), 'id')->pluck('name','id')->all();
        foreach($crypto as $key => $c){
            $mydata[$key] = $this->test($days,$key);
        }
        
        
        $today = date('Y-m-d');
        $yesterday = date('Y-m-d',strtotime("-1 days"));
        
        $todayCrypto = DB::table('currency_rates')->where('created_at', $today)->select('price')->get()->toArray();
        $yesterdayCrypto = DB::table('currency_rates')->where('created_at', $yesterday)->select('price')->get()->toArray();
      
        $array = ['days' => $days, 'mydata' => $mydata, 'todayCrypto' => $todayCrypto, 'yesterdayCrypto' => $yesterdayCrypto, 'crypto' => $crypto];
      
        return response()->json($array);
    }
>>>>>>> a5b0eccdcf43b8767e3e05aa5f8a6b0656d62a38
}
