<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\Product;
use App\Services\ProductService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{

    protected $service;

    public function __construct(ProductService $serv)
    {
        $this->service = $serv;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index()
    {
        return $this->service->getAllProductsService();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) //ProductRequest for validade
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'description' => 'required',
            'tension' => 'required',
            'brand_id' => 'required|exists:brands,id'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        } else {
            $product =  $this->service->insertService($request->all());
            return response()->json([
                'message' => 'Produto criado com sucesso',
                'newProduct' => $product
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::find($id);
        return $product;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product) //ProductRequest
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'description' => 'required',
            'tension' => 'required',
            'brand_id' => 'required|exists:brands,id'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        } else {
            $product = $this->service->updateService($request->all(), $product);
            return response()->json([
                'message' => 'Produto editado com sucesso',
                'updateProduct' => $product
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $this->service->destroyService($product);
        return response()->json([
            'status' => 'success',
            'message' => 'Produto apagado com sucesso'
        ]);
    }
}
