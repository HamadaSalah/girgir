<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Provider extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'tag',
        'description',
        'email',
        'password',
    ];


    public function services()
    {
        return $this->belongsToMany(Service::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class );
    }

}