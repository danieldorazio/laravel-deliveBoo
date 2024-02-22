<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Meal_order extends Model
{
    use HasFactory;
    protected $table = 'meal_order';

    protected $fillable = ['meal_id','order_id','quantity'];
}
