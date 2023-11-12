<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class GetWarehouseData extends Model
{
    use HasFactory;

    static function get () {
        return DB::select('SELECT * FROM get_warehouse_data()');
    }
}
