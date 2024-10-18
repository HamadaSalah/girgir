<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'invoice_number',
        'total',
        'date_from',
        'date_to',
        'gender',
        'notes',
        'status',
        'delivery_status',
        'location',
        'delivery_status',
        'orderable',
        'service_ids',
        'user_id',
        'provider_id'
    ];
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            // Set static value on model creation
            $model->invoice_number = uniqid();
        });
    }


    public function items() {
        return $this->hasMany(OrderItem::class);
    }
    
}
