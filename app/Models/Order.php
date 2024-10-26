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
        'provider_id',
        'coupon_code',
        'another_service_ids'
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


    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'service_ids' => 'array',
        'date_from' => 'datetime',
        'date_to' => 'datetime',
    ];

    public function orderable()
    {
        return $this->morphTo();
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function provider()
    {
        return $this->belongsTo(Provider::class);
    }


    public function getReadableStatusAttribute()
    {
        $statusMapping = [
            'requested' => 'Requested',
            'approved' => 'Approved',
            'cancelled' => 'Cancelled',
            'set_the_installation' => 'Set the installation',
            'the_visit_has_been_scheduled' => 'The visit has been scheduled',
            'worker_on_the_road' => 'Worker on the road',
            'get_started' => 'Get started',
            'work_completed' => 'Work completed',
        ];

        return $statusMapping[$this->status] ?? 'Unknown status';
    }

}
