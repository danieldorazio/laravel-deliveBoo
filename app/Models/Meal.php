<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;


class Meal extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['name','slug','image','description','price','available', 'restaurant_id'];

    protected function setNameAttribute($_name) {
        $this->attributes['name'] = $_name;
        $this->attributes['slug'] = Str::slug($_name);
        if (Auth::check()) {
            $_id = Auth::user()->id;
            $this->attributes['restaurant_id'] = $_id ;
        }
    }

    public function restaurant() {
        return $this->belongsTo(Restaurant::class);
    }

    public function orders() {
        return $this->belongsToMany(Order::class);
    }

}
