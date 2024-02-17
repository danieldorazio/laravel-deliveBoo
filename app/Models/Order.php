<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = ['payment','date','client_email','client_name','delivery_address','delivery_time','delivery_total_price','status_delivery','client_phone'];
}
