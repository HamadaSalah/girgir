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
        return $this->hasMany(Service::class);
    }

    public function packages()
    {
        return $this->hasMany(Package::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class );
    }

    public function info()
    {
        return $this->hasOne(ProviderInfo::class);
    }


    public function files()
    {
        return $this->morphMany(File::class, 'fileable');
    }

    public function withdrawals()
    {
        return $this->hasMany(Withdrawal::class);
    }

    public function getAvatarAttribute()
    {
        $firstFile = $this->files->first();

        return $firstFile ? asset($firstFile->path) : 'https://ui-avatars.com/api/?name='.urlencode($this->name).'&color=7F9CF5&background=EBF4FF';
    }

    //Password Mutator for Hashing Password
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }

}
