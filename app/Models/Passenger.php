<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Bus;

class Passenger extends Model
{
    use HasFactory;
    protected $table = "passenger";
    protected $guarded = [];

    public function modelBus()
    { 
        return $this->belongsTo(Bus::class ,'model_bus' ); 
    }
}
