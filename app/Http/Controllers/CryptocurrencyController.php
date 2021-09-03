<?php

namespace App\Http\Controllers;

use App\Models\Cryptocurrency;
use Illuminate\Http\Request;

class CryptocurrencyController extends Controller
{
    public function __construct(){
        $this->middleware(['auth', 'admin']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cryptocurrencies = Cryptocurrency::all();
        return view('cryptocurrencies.index')->with('cryptocurrencies', $cryptocurrencies);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    
        return view('cryptocurrencies.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $crypto = new Cryptocurrency();
     
        $this->saveCryptocurrency($crypto, $request);
        $crypto->save();
        return redirect('/cryptocurrencies');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cryptocurrency  $cryptocurrency
     * @return \Illuminate\Http\Response
     */
    public function show(Cryptocurrency $cryptocurrency)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cryptocurrency  $cryptocurrency
     * @return \Illuminate\Http\Response
     */
    public function edit(Cryptocurrency $cryptocurrency)
    {
        return view('cryptocurrencies.edit')->with('cryptocurrency', $cryptocurrency);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cryptocurrency  $cryptocurrency
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $crypto = Cryptocurrency::find($id);
        $this->saveCryptocurrency($crypto,$request);
        $crypto->update();
        return redirect('/cryptocurrencies');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cryptocurrency  $cryptocurrency
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $crypto = Cryptocurrency::find($id);
        $crypto->delete();
        return redirect('/cryptocurrencies');
    }
    public function saveCryptocurrency($crypto, $request){
        $crypto->name = $request->name;
        $crypto->image = $request->image;
        $crypto->price = $request->price;
      
    }
    
}
