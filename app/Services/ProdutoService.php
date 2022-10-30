<?php

namespace App\Services;

use App\Models\Produto;
use App\Repositories\ProdutoRepository;

class ProdutoService
{
    private ProdutoRepository $produtoRepository;

    public function __construct(ProdutoRepository $prod)
    {
        return $this->produtoRepository = $prod;
    }

    public function storeService(array $data)
    {
        return $this->produtoRepository->store($data);
    }

    public function updateService(array $data, int $produto_id)
    {
        return $this->produtoRepository->update($data, $produto_id);
    }

    public function deleteService(int $produto_id)
    {
        return $this->produtoRepository->delete($produto_id);
    }

    public function show(){
        return $this->produtoRepository->show();
    }
}
