<?php

namespace App\Repositories;

use App\Http\Resources\ProductResource;
use App\Models\Product;
use Exception;
use Illuminate\Support\Facades\DB;

class ProductRepository
{
    public function getAllProducts()
    {
        return Product::with('brand')->get();
    }

    public function insert(array $data)
    {
        try {
            DB::beginTransaction();
            $product = Product::create($data);
            DB::commit();
            return $product;
        } catch (Exception $err) {
            DB::rollback();
            return false;
        }
    }

    public function update(array $data, int $product_id)
    {
        try {
            DB::beginTransaction();
            $product = Product::find($product_id);
            $product->fill($data);
            $product->save();
            DB::commit();
            return $product;
        } catch (Exception $err) {
            DB::rollBack();
            return false;
        }
    }

    public function destroy(int $product_id)
    {
        $product = Product::find($product_id);
        return $product->delete();
    }
}
