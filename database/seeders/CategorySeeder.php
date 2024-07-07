<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    public function run()
    {
        $categories = [
            ['name' => 'Half Marathon'],
            ['name' => 'Marathon'],
            ['name' => '5K'],
            ['name' => 'Cross Country'],
            ['name' => 'Ultras'],
            ['name' => 'Triathlons'],
            ['name' => 'Adventure Races'],
        ];

        DB::table('categories')->insert($categories);
    }
}
