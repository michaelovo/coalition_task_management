<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $projects = [

            ['name' => 'InterAd design', 'description' => 'In-house application', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Ecommerce', 'description' => 'Ecommerce application', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Ewallet', 'description' => 'Ewallet system', 'created_at' => now(), 'updated_at' => now()],

        ];

        /* Save The Data */
        DB::table('projects')
            ->insert($projects);
    }
}
