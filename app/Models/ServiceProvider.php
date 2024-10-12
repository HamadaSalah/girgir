<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ServiceProvider extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function getProviderTypeAttribute()
    {
        return $this->user->type;
    }

    public function services(): HasMany
    {
        return $this->hasMany(Service::class , 'created_by');
    }

    public function packages(): HasMany
    {
        return $this->services()->where('type', 'package');
    }

    public function servicesItems(): HasMany
    {
        return $this->services()->where('type', 'service');
    }

    public function orders(): HasMany
    {
        return $this->hasMany(Order::class);
    }

    public function feedbacks(): \Illuminate\Database\Eloquent\Relations\HasManyThrough
    {
        return $this->hasManyThrough(Feedback::class, Service::class, 'created_by', 'service_id', 'id', 'id');
    }

    public function averageRating()
    {
        return $this->feedbacks()->avg('rating');
    }

    public function info(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(ServiceProvideInfo::class);
    }


}
