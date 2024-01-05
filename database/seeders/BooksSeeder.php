<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class BooksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('books')->insert(array(
            array(
                'title' => "indi",
                'author_id' => "1",
                'category_id' => "1",
            ),
            array(
                'title' => "indi",
                'author_id' => "1",
                'category_id' => "1",
            ),
            array(
                'title' => "indi",
                'author_id' => "1",
                'category_id' => "1",
            )
            ));
    }
}

