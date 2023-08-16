<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Auditoriam extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('auditoriam')->insert(array(
            [
                'name'=> 'AUDI 1',
                'status' => 1,
                'deleted_at'=>NULL,
                'created_at' => date('Y-m-d h:i:s')
            ],
            [
                'name'=> 'AUDI 2',
                'status' => 1,
                'deleted_at'=>NULL,
                'created_at' => date('Y-m-d h:i:s')
            ],
            [
                'name'=> 'AUDI 3 DOLBY ATMOS',
                'status' => 1,
                'deleted_at'=>NULL,
                'created_at' => date('Y-m-d h:i:s')
            ],
            [
                'name'=> 'AUDI 4 IMAX',
                'status' => 1,
                'deleted_at'=>NULL,
                'created_at' => date('Y-m-d h:i:s')
            ],
        )
            
        );
    }
}
