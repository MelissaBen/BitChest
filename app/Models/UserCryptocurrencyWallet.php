<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
class UserCryptocurrencyWallet extends Model
{
    public $table = "user_cryptocurrency_wallets";
    protected $fillable = [
       
    ];
    public function user(){
        return $this->belongsTo(User::class, 'id_user');
    }
}
