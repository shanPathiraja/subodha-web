<?php

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
        $this->call(DefaultUserSeeder::class);
        $this->call(CategoriesTableSeeder::class);
        $this->call(EventTableSeeder::class);

        if (! app()->isProduction()) {
            // $this->call(PostsTableSeeder::class);
            // $this->call(PapersTableSeeder::class);
        }
    }
}
