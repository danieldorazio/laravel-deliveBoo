<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Restaurant;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class RestaurantController extends Controller
{
    //  public function index($category)
    //  {
    //      $restaurants = Restaurant::whereHas('categories',  function (Builder $query) use ($category) {
    //          $query->where('slug', $category);
    //      })->with('categories')->get();
    //      return response()->json([
    //          'result' => $restaurants,
    //      ]);
    //  }
    public function index(Request $request)
    {
        $restaurants = Restaurant::with('categories');
        if ($request->has('category_slug')) {
            $category_slugs = $request->category_slug;
            foreach ($category_slugs as $category_slug) {
                 $restaurants->whereHas('categories', fn($query) => $query->where('slug', $category_slug));
                // $restaurants = Restaurant::whereHas('categories',  function (Builder $query) use ($category_slug) {
                //     $query->where('slug', $category_slug);
                };
                $pippo = $restaurants->get();
                
                return response()->json([
                    'result' => $pippo,
                    'request' => $category_slugs,
                ]);
            }
        
    }

    public function show($id)
    {
        $restaurant = Restaurant::where('id', $id)->first();
        return response()->json([
            'result' => $restaurant,
        ]);
    }
}
