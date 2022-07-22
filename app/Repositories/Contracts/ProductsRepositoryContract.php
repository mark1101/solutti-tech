<?php

namespace App\Respositories\Contracts;

use App\Models\Product;
use Illuminate\Database\Eloquent\Collection;

interface ProductsRepositoryContract
{
    public function getAllProducts(): ?Collection;

    public function insert(array $array): ?Product;

    public function update(array $array, int $id): ?Product;

    public function destroy(int $id);
}
