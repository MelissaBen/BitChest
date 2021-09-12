<?php

namespace App\Http\Controllers\Front;

use App\Models\Front\UserCryptocurrenciesWallet;
use App\Http\Controllers\Controller;  
use Illuminate\Http\Request;
use DB;
use Session;
use Carbon;
use Carbon\CarbonPeriod;
use App\Models\Admin\CryptocurrenciesRate;
use App\Models\Admin\CryptoCurrency;

class UserCryptocurrenciesWalletController extends Controller
{

    public function __construct(){
        $this->middleware(['customer']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Get all cryptocurrency wallet for current user
        $cryptoWallets = DB::table('user_cryptocurrencies_wallets')
        ->select(['user_cryptocurrencies_wallets.id', 'user_cryptocurrencies_wallets.total', 'cryptocurrencies.name','user_cryptocurrencies_wallets.id_cryptocurrency', 'cryptocurrencies.image'])
        ->join('cryptocurrencies', 'cryptocurrencies.id', '=', 'user_cryptocurrencies_wallets.id_cryptocurrency')
        ->where('id_user', auth()->user()->id)
        ->get();


        $rate = [];

        $userWallet = DB::table('users_wallets')->where('id_user', auth()->user()->id)->first();
        
        $total = [];
        
            foreach($cryptoWallets as $cryptoWallet){
                $rate[] = $this->getRate($cryptoWallet->id);
                $total[] = $this->totalInvest($cryptoWallet->id);
            }
        return view('front.wallets.index')->with('cryptoWallets', $cryptoWallets)->with('rate', $rate)->with('total', $total)->with('userWallet', $userWallet);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cryptocurrencies = Cryptocurrency::all();
        return view('front.wallets.create')->with('cryptocurrencies', $cryptocurrencies);
    }

    public function saveWallet($wallet, $request){
        $wallet->id_cryptocurrency = $request->id_cryptocurrency;
        $wallet->total = 0;
        $wallet->id_user = auth()->user()->id;
      
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        foreach($request->id_cryptocurrency as $id_cryptocurrency){
            $wallet = new UserCryptocurrenciesWallet(); 
            $wallet->id_cryptocurrency = $id_cryptocurrency;
            $wallet->total = 0;
            $wallet->id_user = auth()->user()->id;
             //Check if cryptocurrency's wallet chosen already exists
            $walletExists = DB::table('user_cryptocurrencies_wallets')
            ->where('id_cryptocurrency', $wallet->id_cryptocurrency)
            ->where('id_user', auth()->user()->id)
            ->get()->toArray();

            if(empty($walletExists)){
                $wallet->save();
            }else{
                Session::put('error', 'Vous avez déjà un portefeuille pour cette cryptomonnaie !');
            }
        }
        

        

       

        return redirect('/wallets');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Wallet  $wallet
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $walletActions = DB::table('users_cryptocurrencies_wallets_history as wh')
                            ->join('user_cryptocurrencies_wallets as cw', 'cw.id', 'wh.id_wallet')
                            ->select( 'wh.total', 'wh.gain', 'wh.created_at')
                            ->where('wh.id_user', auth()->user()->id)
                            ->where('wh.id_wallet', $id)
                            ->get()
                            ->toArray();

        $totalWalletActions = DB::table('users_cryptocurrencies_wallets_history as wh')
                    ->join('user_cryptocurrencies_wallets as cw', 'cw.id' , 'wh.id_wallet')
                    ->join('cryptocurrencies as c', 'c.id', 'cw.id_cryptocurrency')
                    ->select('c.name', DB::raw("sum(wh.total) as total, sum(wh.gain) as gain"))
                    ->where('wh.id_user', auth()->user()->id)
                    ->where('wh.id_wallet', $id)
                    ->groupBy('c.name')
                    ->get()
                    ->toArray();
        return view('front.wallets.show')->with('walletActions', $walletActions)
        ->with('totalWalletActions', $totalWalletActions);
    }

   
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Wallet  $wallet
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $wallet = UserCryptocurrenciesWallet::where('id', $id);
        $wallet->delete();
        return redirect('/wallets');
    }


    /**
     * Sell the cryptocurrency's wallet
     */
    public function sellWallet( $id){

        //Get chosen cryptocurrency's wallet data
        $wallet = UserCryptocurrenciesWallet::join('cryptocurrencies as c', 'c.id', 'id_cryptocurrency')    
                ->find($id);
        
        //Get user wallet data
        $userWallet = DB::table('users_wallets')->where('id_user', auth()->user()->id)->first();
        
        //Get current rate for the cryptocurrency
        $rate = $this->getRate($wallet->id);
        
        //User's wallet is incremented and cryptocurrency's wallet is set to 0
        $userWallet->solde += $wallet->total * $rate;
        DB::table('users_wallets')
        ->where('id_user', auth()->user()->id)
        ->update(['solde' => $userWallet->solde]);
    
        $wallet->total = 0;
       
        $wallet->save();
        return redirect('wallets');
    }


    /**
     * Add cryptocurrency to a wallet
     */
    public function addToWallet(Request $request, $id){
        
        $date = date('Y-m-d');

        //Get chosen cryptocurrency's wallet data
        $wallet = UserCryptocurrenciesWallet::join('cryptocurrencies as c', 'c.id', 'id_cryptocurrency')    
                ->find($id);
        
        //Get user wallet data
        $userWallet = DB::table('users_wallets')
        ->where('id_user', auth()->user()->id)
        ->first();
        
        /**
         * If form submitted, we check if user has enough to buy cryptocurrency
         */
        
        if($request->cryptoCashValueWanted){
        
            if(floatval($userWallet->solde) - floatval($request->cryptoCashValueWanted) < 0){
                Session::put('error', 'Votre solde n\'est pas suffisant.');

            }else{

                //Get the user's purchase and it to the cryptocurrency's wallet
                $gain = floatval($request->cryptoCashValueWanted) / $this->getRate($wallet->id);
                $wallet->total += $gain;

                //User's wallet is decremented
                $userWallet->solde -= floatval($request->cryptoCashValueWanted);
                DB::table('users_wallets')
                ->where('id_user', auth()->user()->id)
                ->update(['solde' => $userWallet->solde]);

                //We stock the purchase to get history data
                DB::table('users_cryptocurrencies_wallets_history')->insert([
                    'id_user' => auth()->user()->id,
                    'id_wallet' => $wallet->id, 
                    'total' => floatval($request->cryptoCashValueWanted),
                    'gain' => $gain,
                    'created_at' => date('Y-m-d'),
                    'updated_at' => date('Y-m-d')
                ]);
        
                $wallet->update();
                Session::put('success', 'Vous avez obtenu '. number_format($gain,8) . ' ' . $wallet->name . ' pour '. $request->cryptoCashValueWanted .' € !');
            }
        }
        return redirect('wallets');
    }

    //Get current rate for a cryptocurrency
    public function getRate($id){
        $date = date('Y-m-d');
        $rate = DB::table('cryptocurrencies_rates')
                    ->join('user_cryptocurrencies_wallets', 'user_cryptocurrencies_wallets.id_cryptocurrency', '=', 'cryptocurrencies_rates.id_cryptocurrency')
                    ->where('cryptocurrencies_rates.created_at', '=', $date)
                    ->where('user_cryptocurrencies_wallets.id', '=', $id)
                    ->value('cryptocurrencies_rates.price');
        return $rate;
    }

    //Get total invested for a cryptocurrency's wallet
    public function totalInvest($id){
        $total = DB::table('users_cryptocurrencies_wallets_history')
                    ->where('id_wallet', $id)
                    ->sum('total');
        return $total;
    }
}
