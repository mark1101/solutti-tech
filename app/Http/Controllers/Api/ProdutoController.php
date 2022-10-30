<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProdutoResource;
use App\Models\Produto;
use App\Services\ProdutoService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProdutoController extends Controller
{

    protected ProdutoService $service;

    public function __construct(ProdutoService $prod)
    {
        $this->service = $prod;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $produto = $this->service->show();
        return ProdutoResource::collection($produto);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nome' => 'required|max:60|min:3',
            'valor' => 'required|max:6|min:2',
            'loja_id' => 'required|exists:lojas,id'
        ]);

        if ($validator->fails()) {
            return response()->json(
                $validator->errors(),
                422
            );
        } else {
            $produto = $this->service->storeService($request->all());
            return response()->json([
                'message' => 'Produto criado com sucesso',
                'novo produto: ' => $produto
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
        $produto = Produto::find($id);
        return $produto;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // CHAMADA DIRETAMENTE NA TELA VUE
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Produto $produto)
    {
        $validator = Validator::make($request->all(), [
            'nome' => 'required|max:60|min:3',
            'valor' => 'required|min:2|max:6',
            'loja_id' => 'required|exists:lojas,id'
        ]);

        if ($validator->fails()) {
            return response()->json(
                $validator->errors(),
                422
            );
        } else {
            $produto = $this->service->updateService($request->all(), $produto->id);
            return response()->json([
                'message' => 'Produto editado com sucesso',
                'produto editado: ' => $produto
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Produto $produto)
    {
        $this->service->deleteService($produto->id);
        return response()->json([
            'message' => 'Produto apagado com sucesso'
        ]);
    }
}
