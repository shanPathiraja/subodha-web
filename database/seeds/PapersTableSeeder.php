<?php

use App\Paper;
use Illuminate\Database\Seeder;

class PapersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Paper::class, 20)->create();
    }
}
