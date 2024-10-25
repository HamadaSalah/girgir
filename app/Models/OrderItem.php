<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class OrderItem extends Model
{
    use HasFactory;
    protected $guarded = [];


    public function order() {
        return $this->belongsTo(Order::class);
    }

    public function orderable(): MorphTo
    {
        return $this->morphTo();
    }
}
