<?php

namespace Database\Seeders;

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
          \App\Models\books::factory(100000)->create();
          \App\Models\author::factory(1000)->create();
          \App\Models\category::factory(3000)->create();
         \App\Models\ratings::factory(500000)->create();
       /*  $this->call([
            BooksSeeder::class,
        ]); */
    }
}
