<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Meal;
use Illuminate\Http\Request;

class MealController extends Controller
{
    public function index($id) {
        $meals = Meal::where('restaurant_id', $id)->get();
        return response()->json([
            'result' => $meals,
        ]);
    }
}
