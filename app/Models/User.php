<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Enums\UserTypesEnum;
use Filament\Models\Contracts\FilamentUser;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements FilamentUser
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = [];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    //Password Mutator for Hashing Password
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }

    //Filament Panle Access Control
    public function canAccessPanel(\Filament\Panel $panel): bool
    {
        return $this->type == UserTypesEnum::ADMIN;
    }

    public function getNameAttribute(): string
    {
        return $this->first_name . ' ' . $this->last_name;
    }

    public function serviceProvider()
    {
        return $this->hasOne(ServiceProvider::class);
    }

    public function getBusinessNameAttribute()
    {
        return $this->serviceProvider->business_name;
    }

    public function files(): MorphMany
    {
        return $this->morphMany(File::class, 'fileable');
    }


    public function getProfilePictureAttribute()
    {
        $firstFile = $this->files->first();

        if ($firstFile && file_exists(public_path($firstFile->path))) {
            return asset($firstFile->path);
        }

        return 'https://ui-avatars.com/api/?name=' . urlencode($this->name) . '&color=7F9CF5&background=EBF4FF';
    }

    public function getBusinessPictureAttribute()
    {
        return $this->serviceProvider->profile_picture
            ? url($this->serviceProvider->profile_picture)
            : 'https://ui-avatars.com/api/?name=' . urlencode($this->business_name) . '&color=7F9CF5&background=EBF4FF';
    }

    public function getCapitalNameArrtibute()
    {
        return strtoupper($this->first_name . ' ' . $this->last_name);
    }

    public function isProvider()
    {
        if ($this->type == 'individual_provider' || $this->type == 'company_provider') {
            return true;
        }
        return false;
    }


    public function packages()
    {
        return $this->hasMany(Package::class);
    }

    public function favourites()
    {
        return $this->belongsToMany(Package::class, 'favourites');
    }

    public function hasFavorited(Package $package)
    {
        return $this->favourites()->where('package_id', $package->id)->exists();
    }
    public function carts()
    {
        return $this->hasMany(Cart::class);
    }


}
