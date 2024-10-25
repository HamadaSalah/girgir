<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Notifications\Notifiable;

class Manager extends Authenticatable
{
    use HasFactory , Notifiable;

    protected $guarded = [];

    public function files(): MorphMany
    {
        return $this->morphMany(File::class, 'fileable');
    }

    public function getAvatarAttribute()
    {
        $firstFile = $this->files->first();

        if ($firstFile && file_exists(public_path($firstFile->path))) {
            return asset($firstFile->path);
        }

        return 'https://ui-avatars.com/api/?name=' . urlencode($this->name) . '&color=7F9CF5&background=EBF4FF';
    }

    public function setPasswordAttribute($value): void
    {
        $this->attributes['password'] = bcrypt($value);
    }

    public function provider()
    {
        return $this->belongsTo(Provider::class);
    }

    public function orders()
    {
        return $this->hasMany(ManagerOrder::class , 'mamanger_id');
    }

}
