<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class Service extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'cost', 'provider_id'];



    /*
     |--------------------------------------------------------------------------
     | Relations methods
     |--------------------------------------------------------------------------
    */

    public function files(): MorphMany
    {
        return $this->morphMany(File::class, 'fileable');
    }

    public function orders(): MorphMany
    {
        return $this->morphMany(File::class, 'orderable');
    }

    public function packages() :BelongsToMany
    {
        return $this->belongsToMany(Package::class);
    }
    public function firstPackage()
    {
        return $this->belongsToMany(Package::class)->limit(1)->first();
    }

    public function provider()
    {
        return $this->belongsTo(Provider::class);
    }

    public function getCoverAttribute()
    {
        $firstFile = $this->files->first();

        return $firstFile ? asset($firstFile->path) : asset('imgs/package.png');
    }

}
