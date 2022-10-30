<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'valor',
        'loja_id',
        'ativo'
    ];

    public function loja(){
        return $this->hasOne(Loja::class, 'id' , 'loja_id');
    }

    public function money($valor){
        return $this->attributes['valor'] = sprintf('R$ %s', number_format($valor, 2));
    }
}
