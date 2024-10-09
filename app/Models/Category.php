<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Category extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function image()
    {
        return $this->morphOne(File::class, 'fileable');
    }


    public function getImageUrlAttribute()
    {
        if ($this->image && $this->image->path) {
            return asset($this->image->path);
        }

        return 'https://ui-avatars.com/api/?name=' . urlencode($this->name) . '&color=7F9CF5&background=EBF4FF';
    }

    public function packages()
    {
        return $this->hasMany(Package::class);
    }
}
