<?php

namespace App\Repositories;

use App\Models\Product;
use Exception;
use Illuminate\Support\Facades\DB;

class ProductRepository
{
    /**
     * @return Collection
     */
    public function getAllProducts()
    {
        return Product::with('brand')->get();
    }

    /**
     * @param array $data
     * @return Product
     */
    public function insert(array $data): Product
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

    /**
     * @param int $id
     * @param array $data
     * @return Product
     */
    public function update(array $data, int $product_id): Product
    {
        try {
            DB::beginTransaction();
            $product = Product::find($product_id);
            $product->update($data);
            DB::commit();
            return $product;
        } catch (Exception $err) {
            DB::rollBack();
            return false;
        }
    }

    /**
     * @param int $id
     * @return bool
     */
    public function destroy(int $product_id)
    {
        $product = Product::find($product_id);
        return $product->delete();
    }
}
