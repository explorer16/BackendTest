<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
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
        CREATE OR REPLACE FUNCTION get_clothes_data(IN product_name TEXT, IN product_qty INT)
        RETURNS TABLE (
            id BIGINT,
            cloth character varying,
            materials character varying,
            qty DOUBLE PRECISION
        )
        AS $$
        BEGIN
            RETURN QUERY
            SELECT tab.id as id, clothes.name as cloth, materials.name as materials, tab.quantity * product_qty as qty
            FROM clothes_materials as tab
            JOIN clothes ON clothes.id = tab.cloth_id
            JOIN materials ON materials.id = tab.material_id
            WHERE clothes.name = product_name;
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
        //
    }
};
