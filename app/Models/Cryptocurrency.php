<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cryptocurrency extends Model
{
    use HasFactory;
    public function cryptocurrency(){
        return $this->belongsTo(Cryptocurrency::class, 'cryptocurrency_id');
    }
}
