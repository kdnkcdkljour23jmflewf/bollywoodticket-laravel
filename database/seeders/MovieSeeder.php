<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class MovieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('movie')->insert([
            'name'=> 'dedew',
            'image' => 'dewdew',
            'status' =>1,
            'category_id'=>2,
            'deleted_at'=>NULL
        ]);
    }
}
