<?php

namespace App\Services;

use App\Repositories\BrandRepository;

class BrandService{

    private BrandRepository $repository;

    public function __construct(BrandRepository $repo)
    {
        $this->repository = $repo;
    }

    public function getAllBrandsService(){
        return $this->repository->getAllBrands();
    }


}
