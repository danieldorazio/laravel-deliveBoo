<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category_list = config('db_categories');

        foreach ($category_list as $category) {
            $new_category = new Category();
            $new_category->fill($category);
            $new_category->save();
        }
    }
}
