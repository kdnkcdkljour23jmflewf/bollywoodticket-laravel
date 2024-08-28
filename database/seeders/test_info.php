<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class test_info extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ticket_info')->insert(
            [
                'price' => 100,
                'movie_id' => 1,
                'category_id' => 1,
                'auditoriam_id' =>1
            ]
            );
    }
}
