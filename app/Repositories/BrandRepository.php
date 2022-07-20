<?php

namespace App\Repositories;

use App\Http\Resources\BrandResource;
use App\Models\Brand;

class BrandRepository{

    public function getAllBrands(){
         return BrandResource::collection(Brand::all());
    }

}
