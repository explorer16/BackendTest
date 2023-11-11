<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Clothes_MaterialsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('clothes_materials')->insert([
            'cloth_id' => 1,
            'material_id' => 1,
            'quantity' => 0.8,
        ]);
        DB::table('clothes_materials')->insert([
            'cloth_id' => 1,
            'material_id' => 2,
            'quantity' => 10,
        ]);
        DB::table('clothes_materials')->insert([
            'cloth_id' => 1,
            'material_id' => 3,
            'quantity' => 5,
        ]);
        DB::table('clothes_materials')->insert([
            'cloth_id' => 2,
            'material_id' => 1,
            'quantity' => 1.4
        ]);
        DB::table('clothes_materials')->insert([
            'cloth_id' => 2,
            'material_id' => 2,
            'quantity' => 15
        ]);
        DB::table('clothes_materials')->insert([
            'cloth_id' => 2,
            'material_id' => 4,
            'quantity' => 1
        ]);
    }
}
