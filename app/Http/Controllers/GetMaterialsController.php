<?php

namespace App\Http\Controllers;

use App\Models\GetClothesData;
use App\Models\GetWarehouseData;
use Illuminate\Http\Request;

class GetMaterialsController extends Controller
{
    function get(Request $request)
    {
        $warehouse_data = GetWarehouseData::get();

        $result = [
            'result' => []
        ];
        foreach ($request->all() as $product) {
            $components = GetClothesData::get($product['product_name'], $product['product_qty']);

            $item = [
                'product_name' => $product['product_name'],
                'product_qty' => $product['product_qty'],
                'product_materials' => []
            ];
            foreach ($components as $component_key => $component) {
                foreach ($warehouse_data as $material_key => $material) {
                    if(isset($material) && isset($component) && $material->materials === $component->materials) {
                        if ($material->qty > $component->qty) {
                            $item['product_materials'] [] = [
                                'warehouse_id' => $material->warehouse_id,
                                'material_name' => $material->materials,
                                'qty' => intval($component->qty),
                                'price' => $material->price
                            ];
                            $material->qty -= $component->qty;
                            unset($components[$component_key]);
                        } elseif ($material->qty < $component->qty) {
                            $item['product_materials'] [] = [
                                'warehouse_id' => $material->warehouse_id,
                                'material_name' => $material->materials,
                                'qty' => intval($material->qty),
                                'price' => $material->price
                            ];
                            $component->qty -= $material->qty;
                            unset($warehouse_data[$material_key]);
                        }
                    }
                }

            }
            if (!empty($components)) {
                foreach ($components as $component) {
                    $item['product_materials'] []= [
                        'warehouse_id' => null,
                        'material_name' => $component->materials,
                        'qty' => intval($component->qty),
                        'price' => null
                    ];
                }
            }
            $result['result'][] = $item;
        }

        return response()->json($result);
    }
}
