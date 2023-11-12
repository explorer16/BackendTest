<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class GetClothesData extends Model
{
    use HasFactory;

    static function get ($name, $qty) {
        return DB::select('SELECT * FROM get_clothes_data(:name, :qty)', [
            'name' => $name,
            'qty' => $qty
        ]);
    }
}
