<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\CustomerStoreRequest;
use App\Models\Admin\User;
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
        /**
         * Get all cryptocurrencies id, name, image and today's rate
         */
        $today = date('Y-m-d');
        $yesterday = date('Y-m-d',strtotime("-1 days"));
        $crypto = DB::table('cryptocurrencies as c')
                    ->join('cryptocurrencies_rates as cr', 'c.id', '=', 'cr.id_cryptocurrency')
                    ->where('cr.created_at', $today)
                    ->select(DB::raw('c.name'), 'c.id', 'cr.price', 'c.image')
                    ->get()
                    ->toArray();
        /**
         * Get all cryptocurrencies yesterday's rate
         */
        $yesterdayCrypto = DB::table('cryptocurrencies_rates')
                             ->where('created_at', $yesterday)
                             ->select('price')
                             ->get()
                             ->toArray();

        /**
         * Get a ranking of cryptocurrencies for the day
         */
        $cryptoRanks = DB::table('cryptocurrencies as c')
                         ->join('cryptocurrencies_rates as cr', 'c.id', '=', 'cr.id_cryptocurrency')
                         ->where('cr.created_at',$today)
                         ->select('c.name', 'c.image', 'cr.price')
                         ->orderBy('cr.price', 'desc')
                         ->get();
        
    	return view('home')->with('crypto',$crypto)
        ->with('yesterdayCrypto',$yesterdayCrypto)
        ->with('cryptoRanks',$cryptoRanks);
    }
    

    /**
     * Get all data from database to convert them into JSON and read it through chartjs
     * return json response
     */
    public function convertIntoJson(){
      
        //Get days in current month
        $days = $this->getDaysInCurrentMonth();
        
        //Get an array of cryptocurrencies with id as key and name as value
        $crypto = DB::table('cryptocurrencies')
                    ->select(DB::raw('name'), 'id')
                    ->pluck('name','id')
                    ->all();

        //Get cryptocurrencies arrays which containes rates
        foreach($crypto as $key => $c){
            $cryptocurrenciesRates[$key] = $this->getRatesInPeriod($days,$key);
        }
        
        //Get yesterday and today rate for all cryptocurrencies
        $today = date('Y-m-d');
        $yesterday = date('Y-m-d',strtotime("-1 days"));
        $todayCrypto = DB::table('cryptocurrencies_rates')
                        ->where('created_at', $today)
                        ->select('price')
                        ->get()
                        ->toArray();

        $yesterdayCrypto = DB::table('cryptocurrencies_rates')
                            ->where('created_at', $yesterday)
                            ->select('price')
                            ->get()
                            ->toArray();
      
        //Create a new array which contain all data
        
        
        $data = [
            'days' => $days, 
            'cryptocurrenciesRates' => $cryptocurrenciesRates, 
            'todayCrypto' => $todayCrypto, 
            'yesterdayCrypto' => $yesterdayCrypto, 
            'crypto' => $crypto
        ];
      
        return response()->json($data);
    }

    /**
     * Return an array with all days in current month
     */
    public function getDaysInCurrentMonth(){
        $firstDayThisMonth = date('Y-m-01');
        $lastDayThisMonth = date("Y-m-t");
        $period = CarbonPeriod::between($firstDayThisMonth, $lastDayThisMonth);
        foreach ($period as $date) {
            $days[] = $date->format('Y-m-d');
        }
     
       return $days;
    }
    
    /**
     * Get rates for a cryptocurrency in a period
     */
    public function getRatesInPeriod($days,$id){
        foreach($days as $day){
            $rates[] = DB::table('cryptocurrencies_rates')->where('created_at', $day)->where('id_cryptocurrency', $id)->value('price');
         }
         return $rates;
    }

    public function editCustomerInfo(){
        $user = DB::table('users')->find(auth()->user()->id);
        return view('front.account.edit')->with('user', $user);
    }
    public function updateCustomerInfo(CustomerStoreRequest $request){
        $user = User::find(auth()->user()->id);
        $user->firstname = $request->firstname;
        $user->lastname = $request->lastname;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->update();
        return redirect('/');
    }
}
