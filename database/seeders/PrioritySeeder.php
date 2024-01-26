<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PrioritySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $priorities = [

            ['name' => 'Very High', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'High', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Normal', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Low', 'created_at' => now(), 'updated_at' => now()],
        ];

        /* Save The Data */
        DB::table('priorities')
            ->insert($priorities);
    }
}
