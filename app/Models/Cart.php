<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = ['user_id','birthdaytime','location','notes','phone_numbers', 'time_from', 'time_to', 'discount'];
    
    public function cartable(): MorphTo
    {
        return $this->morphTo();
    }


    
    
}
