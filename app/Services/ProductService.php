<?php

namespace App\Services;

use App\Http\Requests\ProductRequest;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use App\Repositories\ProductRepository;

class ProductService
{

    private ProductRepository $repository;

    public function __construct(ProductRepository $repo)
    {
        $this->repository = $repo;
    }

    public function insertService(array $data): Product
    {
        return $this->repository->insert($data);
    }

    public function updateService(array $data, Product $product)
    {
        return $this->repository->update($data, $product->id);
    }

    public function destroyService(Product $product)
    {
        return $this->repository->destroy($product->id);
    }

    public function getAllProductsService()
    {
        return $this->repository->getAllProducts();
    }
}
