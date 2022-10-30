<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProdutoResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'nome' => $this->nome,
            'valor' => 'R$ ' . number_format($this->valor, 2),
            'loja' => $this->loja,
            'ativo' => $this->ativo == 1 ? 'Ativo' : 'Desativado'
        ];
    }
}
