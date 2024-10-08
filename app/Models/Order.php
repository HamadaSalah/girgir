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

    
}
