<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class Restaurant extends Model
{
    use HasFactory;



    protected $fillable = ['restaurant_name', 'slug', 'image', 'street', 'time_open', 'time_close', 'piva_user'];

    protected function setRestaurantNameAttribute($_name)
    {
        $this->attributes['restaurant_name'] = $_name;
        $this->attributes['slug'] = Str::slug($_name);
        $_id = Auth::user()->id;
        $this->attributes['user_id'] = $_id;
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    public function meals()
    {
        return $this->hasMany(Meal::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
