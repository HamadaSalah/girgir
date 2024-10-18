<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class Package extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'cost', 'category_id','provider_id', 'order_count'];

    protected $casts = [
        'cost' => 'integer'
    ];
    /*
     |--------------------------------------------------------------------------
     | Relations methods
     |--------------------------------------------------------------------------
    */

    public function files(): MorphMany
    {
        return $this->morphMany(File::class, 'fileable');
    }

    public function services()
    {
        return $this->belongsToMany(Service::class);
    }


    public function getCoverAttribute()
    {
        $firstFile = $this->files->first();

        return $firstFile ? asset($firstFile->path) : asset('imgs/package.png');
    }

    public function provider()
    {
        return $this->belongsTo(Provider::class);
    }

    public function orders(): MorphMany
    {
        return $this->morphMany(Order::class, 'orderable');
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function carts(): MorphMany
    {
        return $this->morphMany(Cart::class, 'cartable');
    }

}
