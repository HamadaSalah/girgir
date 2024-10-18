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
    ];


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
}
