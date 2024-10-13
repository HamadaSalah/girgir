<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Notifications\Notifiable;

class Provider extends Authenticatable
{
    use HasFactory , Notifiable;

    protected $guarded = [];


    public function services(): BelongsToMany
    {
        return $this->hasMany(Service::class);
    }

    public function packages()
    {
        return $this->hasMany(Package::class);
    }

    public function orders(): HasMany
    {
        return $this->hasMany(Order::class );
    }
    public function packages(): HasMany
    {
        return $this->hasMany(Package::class );
    }
    public function package(): HasMany
    {
        return $this->hasMany(Package::class)->latest()->take(1);
    }
    public function files(): MorphMany
    {
        return $this->morphMany(File::class, 'fileable');
    }



    //Password Mutator for Hashing Password
    public function setPasswordAttribute($value): void
    {
        $this->attributes['password'] = bcrypt($value);
    }

}
