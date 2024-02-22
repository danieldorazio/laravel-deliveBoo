<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Meal;
use App\Models\Order;
use App\Models\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $restaurantId = Auth::user()->restaurant->id;
        $orders = Order::whereHas('meals', function ($query) use ($restaurantId) {
            $query->where('restaurant_id', $restaurantId);
        })->with(['meals' => function ($query) use ($restaurantId) {
            $query->where('restaurant_id', $restaurantId);
        }])->get();

        return view('admin.orders.index', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        $meals = $order->meals;

        $total_price = 0;

        $pivot = DB::table('orders')->join('meal_order', function ($join) {
            $join->on('orders.id', '=', 'meal_order.order_id')->orderBy('orders.id');
        })->get();

        $array = [];
        foreach ($pivot as $pivot_item) {

            if ($pivot_item->order_id === $order->id) {
                array_push($array, $pivot_item);
            }
        }

        foreach ($meals as $meal) {
            foreach ($array as $value) {
                if ($meal->id === $value->meal_id) {
                    $total_price = $total_price + ($meal->price * $value->quantity);
                }
            }
        }

        return view('admin.orders.show', compact('order', 'meals', 'array', 'total_price'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
