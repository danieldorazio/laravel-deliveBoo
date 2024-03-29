<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UsertableSeeder::class,
            RestaurantsTableSeeder::class,
            CategoriesTableSeeder::class,
            MealsTableSeeder::class,
            OrdersTableSeeder::class,
            Meal_orderTableSeeder::class,
            Category_restaurantTableSeeder::class,

        ]);
    }
}
