<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MaterialsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('materials')->insert([
            'name' => 'Ткань',
        ]);
        DB::table('materials')->insert([
            'name' => 'Нитка',
        ]);
        DB::table('materials')->insert([
            'name' => 'Пуговица',
        ]);
        DB::table('materials')->insert([
            'name' => 'Замок',
        ]);
    }
}
