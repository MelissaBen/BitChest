<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cryptocurrency;

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
    {
        $cryptocurrencies = Cryptocurrency::all();
        $wallet = Wallet::where('id_user',2)->get();
        return view('home')->with('cryptocurrencies', $cryptocurrencies)->with('wallet', $wallet);
    }
    
}
