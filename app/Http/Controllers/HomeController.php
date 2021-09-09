<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cryptocurrency;

use DB;
use App\Models\UserCryptocurrencyWallet;
use Carbon\CarbonPeriod;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {   
        
        //Get cryptocurrencies
        $today = date('Y-m-d');
        $yesterday = date('Y-m-d',strtotime("-1 days"));

        $crypto = DB::table('cryptocurrencies as c')->join('currency_rates as cr', 'c.id', '=', 'cr.id_cryptocurrency')->where('cr.created_at', $today)->select(DB::raw('c.name'), 'c.id', 'cr.price', 'c.image')->get()->toArray();
        $yesterdayCrypto = DB::table('currency_rates')->where('created_at', $yesterday)->select('price')->get()->toArray();
        $cryptoRanks = DB::table('cryptocurrencies as c')->join('currency_rates as cr', 'c.id', '=', 'cr.id_cryptocurrency')->where('cr.created_at',$today)->select('c.name', 'c.image', 'cr.price')->orderBy('cr.price', 'desc')->get();
        

    	return view('home')->with('crypto',$crypto)->with('yesterdayCrypto',$yesterdayCrypto)->with('cryptoRanks',$cryptoRanks);
      
    }
    

    public function convertIntoJson(){
      
        $days = $this->getDaysInCurrentMonth();
        $crypto = DB::table('cryptocurrencies')->select(DB::raw('name'), 'id')->pluck('name','id')->all();
       
        foreach($crypto as $key => $c){
            $mydata[$key] = $this->getRatesInPeriod($days,$key);
        }

        $today = date('Y-m-d');
        $yesterday = date('Y-m-d',strtotime("-1 days"));
        
        $todayCrypto = DB::table('currency_rates')->where('created_at', $today)->select('price')->get()->toArray();
        $yesterdayCrypto = DB::table('currency_rates')->where('created_at', $yesterday)->select('price')->get()->toArray();
      
        $array = ['days' => $days, 'mydata' => $mydata, 'todayCrypto' => $todayCrypto, 'yesterdayCrypto' => $yesterdayCrypto, 'crypto' => $crypto];
      
        
        return response()->json($array);
    }

    public function getDaysInCurrentMonth(){

        $firstDayThisMonth = date('Y-m-01');
        $lastDayThisMonth = date("Y-m-t");
        $period = CarbonPeriod::between($firstDayThisMonth, $lastDayThisMonth);
        foreach ($period as $date) {
            $days[] = $date->format('Y-m-d');
        }
       return $days;
    }

    public function getDaysInCurrentWeek(){
        $firstDayThisWeek = date('Y-m-d',strtotime("last monday"));
        $lastDayThisWeek = date('Y-m-d',strtotime("next sunday"));
        $period = CarbonPeriod::between($firstDayThisWeek, $lastDayThisWeek);
        foreach ($period as $date) {
            $days[] = $date->format('Y-m-d');
        }
        return $days;
    }
    
    public function getRatesInPeriod($days,$id){
        foreach($days as $day){
            $rates[] = DB::table('currency_rates')->where('created_at', $day)->where('id_cryptocurrency', $id)->value('price');
         }
         return $rates;
    }
}
