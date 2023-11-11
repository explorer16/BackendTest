<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WarehouseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('warehouse')->insert([
            'material_id' => '1',
            'quantity' => '12',
            'price' => '1500',
        ]);
        DB::table('warehouse')->insert([
            'material_id' => '1',
            'quantity' => '200',
            'price' => '1600',
        ]);
        DB::table('warehouse')->insert([
            'material_id' => '2',
            'quantity' => '40',
            'price' => '500',
        ]);
        DB::table('warehouse')->insert([
            'material_id' => '2',
            'quantity' => '300',
            'price' => '550',
        ]);
        DB::table('warehouse')->insert([
            'material_id' => '3',
            'quantity' => '500',
            'price' => '300',
        ]);
        DB::table('warehouse')->insert([
            'material_id' => '4',
            'quantity' => '1000',
            'price' => '2000',
        ]);
    }
}
