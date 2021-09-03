<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

use App\Models\UserCryptocurrencyWallet;
class User extends Authenticatable
{
    use HasFactory, Notifiable, HasRoles;
    public function userCryptocurrencyWallets(){
        return $this->hasMany('App\Models\UserCryptocurrencyWallet', 'id');
    }
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'firstname',
        'lastname',
        'email',
        'password',
        'role_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function wallets(){
        return $this->hasMany('App\Models\Cryptocurrency');
    }



public function isAdmin()
{
    
    $user = User::where('id', $this->id)->pluck('role_id');
    if($user[0] == 1){
        $isAdmin = true;
    }else{
        $isAdmin = false;
    }
    return $isAdmin;
}
}
