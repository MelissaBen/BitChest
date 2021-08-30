<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cryptocurrency extends Model
{
    use HasFactory;
<<<<<<< HEAD
    public function cryptocurrency(){
        return $this->belongsTo(Cryptocurrency::class, 'cryptocurrency_id');
    }
=======
    
>>>>>>> a5b0eccdcf43b8767e3e05aa5f8a6b0656d62a38
}
