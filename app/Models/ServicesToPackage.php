<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServicesToPackage extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function service(){
        return $this->belongsTo(Service::class, 'service_id', 'id');
    }
    public function provider(){
        return $this->belongsTo(Service::class, 'provider_id', 'id');
    }
}
