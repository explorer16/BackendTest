<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement('
        CREATE OR REPLACE FUNCTION get_warehouse_data()
        RETURNS TABLE (
            warehouse_id BIGINT,
            materials character varying,
            qty INT,
            price INTEGER
        )
        AS $$
        BEGIN
            RETURN QUERY
            SELECT warehouse.id as warehouse_id, materials.name as materials, warehouse.quantity as qty, warehouse.price as price
            FROM warehouse
            JOIN materials ON warehouse.material_id = materials.id;
        END;
        $$ LANGUAGE plpgsql;
        ');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('get_materials_function');
    }
};
