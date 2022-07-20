<?php

namespace Tests\Unit;

use App\Models\Brand;
use App\Models\Product;
use App\Repositories\ProductRepository;
use App\Services\ProductService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\TestCase;

class ProductTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_create_product()
    {
        $brand = Brand::find(1);
        $product = array(
            'name' => 'Geladeira Frost Freee',
            'description' => 'Este produto é totalmente versátil',
            'tensio' => '220v',
            'brand_id' => $brand->id
        );

        $response =  (new ProductService(new ProductRepository))->insertService($product);

        $this->assertNotEmpty($response);
    }
}
