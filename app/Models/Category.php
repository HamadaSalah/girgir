<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Category extends Model
{
    use HasFactory;

    protected $guarded = [];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphOne
     */
    public function image()
    {
        return $this->morphOne(File::class, 'fileable');
    }


    /**
     * @return string
     */
    public function getImageUrlAttribute(): string
    {
        if ($this->image && $this->image->path) {
            return asset($this->image->path);
        }

        return 'https://ui-avatars.com/api/?name=' . urlencode($this->name) . '&color=7F9CF5&background=EBF4FF';
    }

    /*
     |--------------------------------------------------------------------------
     | Relations methods
     |--------------------------------------------------------------------------
    */

    /**
     * @return HasMany
     */
    public function packages(): HasMany
    {
        return $this->hasMany(Package::class);
    }

    
    public function files()
    {
        return $this->morphMany(File::class, 'fileable')->first();
    }

}
