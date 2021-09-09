<?php

namespace App\Http\Controllers\Front;

use App\Models\Front\UserCryptocurrencyWallet;
use App\Http\Controllers\Controller;  
use Illuminate\Http\Request;
use DB;
use Session;
use App\Models\CurrencyRate;
use App\Models\Admin\CryptoCurrency;

class UserCryptocurrencyWalletController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Get all cryptocurrency wallet for current user
        $cryptoWallets = DB::table('user_cryptocurrency_wallets')
        ->select(['user_cryptocurrency_wallets.id', 'user_cryptocurrency_wallets.total', 'cryptocurrencies.name','user_cryptocurrency_wallets.id_cryptocurrency', 'cryptocurrencies.image'])
        ->join('cryptocurrencies', 'cryptocurrencies.id', '=', 'user_cryptocurrency_wallets.id_cryptocurrency')
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

        $wallet = new UserCryptocurrencyWallet();
        $this->saveWallet($wallet, $request);

        //Check if wallet is already registered in DB
        $walletExists = DB::table('user_cryptocurrency_wallets')
        ->where('id_cryptocurrency', $wallet->id_cryptocurrency)
        ->where('id_user', auth()->user()->id)
        ->get()->toArray();

        if(empty($walletExists)){
            $wallet->save();
        }else{
            Session::put('error', 'Vous avez déjà un portefeuille pour cette cryptomonnaie !');
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
        $walletActions = DB::table('user_wallet_history as wh')
        ->join('user_cryptocurrency_wallets as cw', 'cw.id', 'wh.id_wallet')
        ->select('wh.total', 'wh.created_at')
        ->where('wh.id_user', auth()->user()->id)
        ->where('wh.id_wallet', $id)
        ->get()->toArray();
        return view('front.wallets.show')->with('walletActions', $walletActions);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Wallet  $wallet
     * @return \Illuminate\Http\Response
     */
    public function edit(UserCryptocurrencyWallet $userCryptocurrencyWallet)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Wallet  $wallet
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UserCryptocurrencyWallet $userCryptocurrencyWallet)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Wallet  $wallet
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $wallet = UserCryptocurrencyWallet::where('id', $id);
        $wallet->delete();
        return redirect('/wallets');
    }

    public function sellWallet( $id){
        $wallet = UserCryptocurrencyWallet::find($id);
        $userWallet = DB::table('users_wallets')->where('id_user', auth()->user()->id)->first();
        $rate[] = $this->getRate($wallet->id);
        $userWallet->solde += $wallet->total * $rate[0][0];
        $wallet->total = "0";
        DB::table('users_wallets')->where('id_user', auth()->user()->id)->update(['solde' => $userWallet->solde]);
        $this->getRate($id);
        $wallet->save();
        return redirect('wallets');
    }



    public function addToWallet(Request $request, $id){

        $wallet = UserCryptocurrencyWallet::find($id);
        $date = date('Y-m-d');

        $userWallet = DB::table('users_wallets')
        ->where('id_user', auth()->user()->id)
        ->first();
        
        
        $getCryptocurrency = CurrencyRate::where('created_at', $date)->where('id_cryptocurrency', $wallet->id_cryptocurrency)->pluck('price');
        $userWallet->solde -= $request->updatee * $getCryptocurrency[0];
        DB::table('users_wallets')->where('id_user', auth()->user()->id)->update(['solde' => $userWallet->solde]);
  
        


        if($request->updatee){
            DB::table('user_wallet_history')->insert([
                'id_user' => auth()->user()->id,
                'id_wallet' => $wallet->id, 
                'total' => $getCryptocurrency[0] * $request->updatee,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]);

            $wallet->total += $request->updatee;
            $userWallet->solde -= $request->updateee;
            
            DB::table('users_wallets')->where('id_user', auth()->user()->id)->update(['solde' => $userWallet->solde]);
        }

        if($request->updateee){
            DB::table('user_wallet_history')->insert([
                'id_user' => auth()->user()->id,
                'id_wallet' => $wallet->id, 
                'total' =>  $request->updateee,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]);
            $wallet->total += ($request->updateee / $this->getRate($wallet->id)[0]);
            $userWallet->solde -= $request->updateee;
            
            DB::table('users_wallets')->where('id_user', auth()->user()->id)->update(['solde' => $userWallet->solde]);
        }
    
        $wallet->update();
        return redirect('wallets');
    }
    public function getRate($id){
        $date = date('Y-m-d');
        $wallet = DB::table('currency_rates')->join('user_cryptocurrency_wallets', 'user_cryptocurrency_wallets.id_cryptocurrency', '=', 'currency_rates.id_cryptocurrency')->where('currency_rates.created_at', '=', $date)->where('user_cryptocurrency_wallets.id', '=', $id)->pluck('currency_rates.price');
        $soldeValue = UserCryptocurrencyWallet::find($id);
        return $wallet;
    }
    public function totalInvest($id){
        $total = DB::table('user_wallet_history')->where('id_wallet', $id)->sum('total');
        return $total;
    }
}
