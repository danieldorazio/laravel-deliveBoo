<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Restaurant;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class RestaurantController extends Controller
{
    public function index($category) {

       $restaurants = Restaurant::whereHas('categories',  function (Builder $query) use ($category) {
        $query->where('slug', $category);
        })->get();
       return response()->json([
        'result' => $restaurants,
       ]);
    }


    public function show($id) {
        $restaurant = Restaurant::where('id', $id)->first();
        return response()->json([
            'result'=> $restaurant,
        ]);
    }
}

