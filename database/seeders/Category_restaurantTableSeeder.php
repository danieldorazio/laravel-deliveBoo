<?php

namespace Database\Seeders;

use App\Models\Category_restaurant;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Category_restaurantTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category_restaurant_list = config('db_category_restaurant');

        foreach ($category_restaurant_list as $category_restaurant) {
            $new_category_restaurant = new Category_restaurant();
            $new_category_restaurant->fill($category_restaurant);
            $new_category_restaurant->save();
        }
    }
}
