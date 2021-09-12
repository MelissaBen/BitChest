<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Admin\Cryptocurrency;
use Illuminate\Http\Request;
use Session;

class CryptocurrencyController extends Controller
{
    //Need to be authenticated and admin
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
        return view('admin.cryptocurrencies.index')->with('cryptocurrencies', $cryptocurrencies);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.cryptocurrencies.create');
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
        Session::put('success', 'Cryptomonnaie ' . $crypto->name . ' ajouté avec succès.');
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
        return view('admin.cryptocurrencies.edit')->with('cryptocurrency', $cryptocurrency);
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

    /**
     * Get form request to store data in database
     */
    
    public function saveCryptocurrency($crypto, $request){
        $crypto->name = $request->name;
        if(!empty($request->file('image'))){
            $crypto->image = $request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('public/images/', $request->file('image')->getClientOriginalName());
        }else{
            $crypto->image = 'no_image_found.png';
        }
    }

    //Delete the image to upload another one
    public function deleteImage($id){
        $crypto =   Cryptocurrency::find($id);
        $crypto->image = '';
        $crypto->update(); 
        return redirect('/cryptocurrencies/' .$id.'/edit');
    }
    
}
