<?php

namespace Database\Seeders;

use App\Models\Meal_order;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Meal_orderTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $meal_order_list = config('db_meal_order');

        foreach ($meal_order_list as $meal_order) {

            $new_meal_order = new Meal_order();
            $new_meal_order->fill($meal_order);
            $new_meal_order->save();
        }
    }
}
