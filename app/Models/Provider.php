<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Provider extends Model
{
    use HasFactory;

    protected $guarded = [];


    public function services()
    {
        return $this->belongsToMany(Service::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class );
    }

    //Password Mutator for Hashing Password
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }

}
