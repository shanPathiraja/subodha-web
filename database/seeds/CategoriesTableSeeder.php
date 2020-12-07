<?php

use App\Category;
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
        Category::create([
            'id' => 1,
            'name' => 'Uncategorized',
            'slug' => 'uncategorized',
            'description' => 'For all posts that do not belong to a spesific category.',
        ]);
    }
}
