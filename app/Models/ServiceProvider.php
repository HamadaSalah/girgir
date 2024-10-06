<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceProvider extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getProviderTypeArrtibute()
    {
        return $this->user->type;
    }

    public function services()
    {
        return $this->hasMany(Service::class , 'created_by');
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function feedbacks()
    {
        return $this->hasManyThrough(Feedback::class, Service::class, 'created_by', 'service_id', 'id', 'id');
    }

    public function averageRating()
    {
        return $this->feedbacks()->avg('rating');
    }


}
