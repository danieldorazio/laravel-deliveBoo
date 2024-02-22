<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRestaurantRequest;
use App\Models\Category;
use App\Models\Meal;
use App\Models\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class RestaurantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $restaurant = Restaurant::where('user_id', '=' ,Auth::user()->id)->get();

        // user id check
        // $this->checkUser($restaurant);
        
        return view('admin.restaurants.index', compact('restaurant'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $meals = Meal::all();
        $categories = Category::all();
        return view('admin.restaurants.create', compact('meals','categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRestaurantRequest $request)
    {
        $form_data = $request->validated();
        $restaurant = new Restaurant();
        $restaurant->fill($form_data);

        if ($request->hasFile('image')) {
            $path = Storage::put('restaurant_images', $request->image);
            $restaurant->image = $path;
        }

        $restaurant->save();

        if($request->has('categories')){
            $restaurant->categories()->attach($request->categories);
        }

        return redirect()->route('admin.restaurants.show', ['restaurant' => $restaurant->slug]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Restaurant $restaurant)
    { 
        // user id check
        $this->checkUser($restaurant);
        return view('admin.restaurants.show', compact('restaurant'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function edit(Restaurant $restaurant)
    {
        $meals = Meal::all();
        $categories = Category::all();

        // user id check
        $this->checkUser($restaurant);
        return view('admin.restaurants.edit', compact('restaurant', 'meals','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Restaurant $restaurant)
    {
        // user id check
        $this->checkUser($restaurant);

        $form_data = $request->all();

        if($request->hasFile('image')) {
            if($restaurant->image) {
                Storage::delete($restaurant->image);
            }

            $path = Storage::put('restaurant_images', $request->image);
            $form_data['image'] = $path;
        }
        
        $restaurant->update($form_data);

        if ($request->has('categories')) {
            $restaurant->categories()->sync($request->categories);
        } else {
            $restaurant->categories()->sync([]);
        }

        return redirect()->route('admin.restaurants.show', ['restaurant' => $restaurant->slug]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $restaurant
     * @return \Illuminate\Http\Response
     */
    public function destroy(Restaurant $restaurant)
    {
        // user id check
        $this->checkUser($restaurant);
        $restaurant->delete();

        return redirect()->route('admin.restaurants.index')->with('message', "$restaurant->restaurant_name deleted succesfully");
    }

    // user id check
    private function checkUser(Restaurant $restaurant) {
        if($restaurant->user_id !== Auth::user()->id) {
            abort(404);
        }
    }
}
