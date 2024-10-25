<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ManagerOrder extends Model
{
    use HasFactory;

    protected $table = 'manager_order';
    protected $guarded = [];

    public function manager()
    {
        return $this->belongsTo(Manager::class , 'mamanger_id');
    }

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
