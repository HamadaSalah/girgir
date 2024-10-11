<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Provider extends Authenticatable
{
    use HasFactory , Notifiable;

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
