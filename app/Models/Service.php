<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function createdBy()
    {
        return $this->belongsTo(ServiceProvider::class, 'created_by');
    }

    public function images()
    {
        return $this->hasMany(ServiceImage::class);
    }

    public function feedbacks()
    {
        return $this->hasMany(Feedback::class);
    }
    
    public function averageRating()
    {
        return $this->feedbacks()->avg('rating');
    }

    public function totalFeedbacks()
    {
        return $this->feedbacks()->count();
    }

    public function scopePackages($query)
    {
        return $query->where('type', 'package');
    }

    public function scopeServices($query)
    {
        return $query->where('type', 'service');
    }

    public function features()
    {
        return $this->hasMany(ServiceFeature::class);
    }

    public function varieties()
    {
        return $this->hasMany(ServiceVariety::class);
    }

    public function orders()
    {
        return $this->hasMany(OrderItem::class);
    }
}
