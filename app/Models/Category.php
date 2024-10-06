<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function getImageUrlAttribute(): string
    {
        return asset($this->image);
    }

    public function services()
    {
        return $this->hasMany(Service::class);
    }
}
