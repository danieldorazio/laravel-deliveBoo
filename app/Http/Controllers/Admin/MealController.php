<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreMealRequest;
use App\Http\Requests\UpdateMealRequest;
use App\Models\Meal;
use App\Models\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use SebastianBergmann\CodeCoverage\Report\Xml\Project;
use Illuminate\Support\Facades\Storage;

class MealController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // user id check
        // $this->checkUser($meal);

        $meals = Meal::where('restaurant_id', '=', Auth::user()->id)->get();
        return view('admin.meals.index', compact('meals'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $restaurants = Restaurant::all();
        return view('admin.meals.create', compact('restaurants'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMealRequest $request)
    {
        $form_data = $request->validated();
        $meal = new Meal();
        $meal->fill($form_data);

        if ($request->hasFile('image')) {
            $path = Storage::put('meal_images', $request->image);
            $meal->image = $path;
        }

        $meal->save();

        return redirect()->route('admin.meals.show', ['meal' => $meal->slug]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Meal $meal)
    {
        // user id check
        $this->checkUser($meal);

        return view('admin.meals.show', compact('meal'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Meal $meal)
    {
        // user id check
        $this->checkUser($meal);

        $restaurants = Restaurant::all();
        return view('admin.meals.edit', compact('meal', 'restaurants'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMealRequest $request, Meal $meal)
    {
        // user id check
        $this->checkUser($meal);

        $form_data = $request->validated();

        if($request->hasFile('image')) {
            if($meal->image) {
                Storage::delete($meal->image);
            }

            $path = Storage::put('meal_images', $request->image);
            $form_data['image'] = $path;
        }

        $meal->update($form_data);

        return redirect()->route('admin.meals.show', ['meal' => $meal->slug]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Meal $meal)
    {
        // user id check
        $this->checkUser($meal);

        $meal->delete();

        return redirect()->route('admin.meals.index')->with('message', "$meal->name has been deleted");
    }

    // user id check
    private function checkUser(Meal $meal) {
        $user = Auth::user();
        if($meal->restaurant_id !== $user->restaurant->id) {
            abort(404);
        }
    }

    public function trash()
    {
        $meals = Meal::onlyTrashed()->get();

        return view('admin.meals.trash', compact('meals'));        
    }

    public function trash_delete($slug)
    {
        $meal = Meal::onlyTrashed()->where('slug', $slug)->first();
        Storage::delete($meal->image);
        $meal->forceDelete();
        

        return redirect()->route('admin.meals.trash')->with('message', "$meal->name has been deleted permanently");
    }

    public function restore($slug)
    {
        $meal = Meal::onlyTrashed()->where('slug', $slug)->first();
        $meal->restore();

        return redirect()->route('admin.meals.index')->with('message', "$meal->name has been restored");
    }

    public function delete_all() {
        $meals = Meal::onlyTrashed()->get();
        foreach ($meals as $meal) { 
            Storage::delete($meal->image); 
            $meal->forceDelete();
        }

        return redirect()->route('admin.meals.trash');
    }
}
