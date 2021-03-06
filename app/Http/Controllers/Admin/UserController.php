<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\User;
use Illuminate\Http\Request;
use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\UserUpdateRequest;
use DB;
use Session;

class UserController extends Controller
{
    //Need to be authenticated 

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
        $users = DB::table('roles')
        ->join('users', 'users.role_id', '=', 'roles.id')
        ->orderBy('users.id', 'asc')
        ->get();
        return view('admin.users.index')->with('users', $users);
    }

    /**
     * Show the form for creating a new resource.
     * 
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = DB::table('roles')->get();
        return view('admin.users.create')->with('roles', $roles);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserStoreRequest $request)
    {
        $user = new User();
        
        $user->password = bcrypt($request->password);
        $this->saveUser($user, $request);

        // By default, user's role is customer
        $user->role_id = 2;
        $user->save();
        Session::put('success', 'Utilisateur ' . $user->firstname . ' '. $user->lastname . ' ajouté avec succès.');
        return redirect('/users');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $cryptocurrency
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cryptocurrency  $cryptocurrency
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
           
        $roles = DB::table('roles')->get()->toArray();
      
        return view('admin.users.edit')->with('roles', $roles)->with('user', $user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cryptocurrency  $cryptocurrency
     * @return \Illuminate\Http\Response
     */
    public function update(UserUpdateRequest $request, $id)
    {
        $user = User::find($id);
        Db::table('model_has_roles')->where('model_id', $id)->update(['role_id' => $request->role_id]);
        $this->saveUser($user,$request);
        $user->update();
        return redirect('/users');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cryptocurrency  $cryptocurrency
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect('/users');
    }
 
    /*
    * Get form request to store data in database
    */
    public function saveUser($user, $request){
        $user->firstname = $request->firstname;
        $user->lastname = $request->lastname;
        $user->role_id = $request->role_id;
        $user->email = $request->email;
        $user->role_id = $request->role_id;
    }
}
