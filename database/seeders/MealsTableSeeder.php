<?php

namespace Database\Seeders;

use App\Models\Meal;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MealsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $meal_list = config('db_meals');

        foreach ($meal_list as $meal) {
            
            $new_meal = new Meal();
            $new_meal->fill($meal);
            $new_meal->save();
            
        }
    }
}
