<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['payment','date','client_email','client_name','delivery_address','delivery_time','status_delivery','client_phone'];

    public function meals() {
        return $this->belongsToMany(Meal::class);
    }
}
