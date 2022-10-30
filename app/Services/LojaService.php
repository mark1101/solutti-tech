<?php

namespace App\Services;

use App\Repositories\LojaRepository;

class LojaService{

    private LojaRepository $lojaRepository;

    public function __construct(LojaRepository $loja)
    {
        $this->lojaRepository = $loja;
    }

    public function showService(){
        return $this->lojaRepository->show();
    }

    public function storeService(array $data){
        return $this->lojaRepository->store($data);
    }

    public function updateService(array $data, int $loja_id){
        return $this->lojaRepository->updade($data, $loja_id);
    }

    public function deleteService(int $loja_id){
        return $this->lojaRepository->delete($loja_id);
    }

}


?>
