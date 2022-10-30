<?php

namespace App\Repositories;

use App\Mail\SendProduto;
use App\Models\Produto;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class ProdutoRepository
{

    /**
     * @return Collection
     */
    public function show()
    {
        return Produto::with('loja')->get();
    }

    /**
     * @param array $data
     * @return Produto
     */
    public function store(array $data)
    {
        try {
            DB::beginTransaction();
            $produto = Produto::create([
                'nome' => $data['nome'],
                'valor' => $data['valor'],
                'loja_id' => $data['loja_id'],
                'ativo' => 1
            ]);
            DB::commit();
            $produto['mensagem'] = 'Criado';
            //Mail::to('emailparadisparo')->send(new SendProduto($produto));
            return $produto;
        } catch (Exception $err) {
            DB::rollback();
            return false;
        }
    }

    /**
     * @param int $id
     * @param array $data
     * @return Produto
     */
    public function update(array $data, int $produto_id)
    {
        try {
            DB::beginTransaction();
            $product = Produto::find($produto_id);
            $product->update($data);
            $product['mensagem'] = 'Editado';
            //Mail::to('emailparadisparo')->send(new SendProduto($product));
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
    public function delete(int $produto_id)
    {
        try {
            Db::beginTransaction();
            $produto = Produto::find($produto_id);
            $produto->delete();
            DB::commit();
        } catch (\Exception $error) {
            DB::rollBack();
            return false;
        }
    }
}
