<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cryptocurrency;
use DB;
use App\Models\Wallet;
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
    
}
