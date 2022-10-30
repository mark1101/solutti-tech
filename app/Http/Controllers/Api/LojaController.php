<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Loja;
use App\Services\LojaService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class LojaController extends Controller
{

    protected LojaService $service;

    public function __construct(LojaService $loja)
    {
        $this->service = $loja;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->service->showService();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'nome' => 'required|max:40|min:3',
            'email' => 'required|email|unique:lojas,email,except,id'
        ]);

        if ($validator->fails()) {
            return response()->json(
                $validator->errors(),
                422);
        } else {
            $loja = $this->service->storeService($request->all());
            return response()->json([
                'message' => 'Loja criada com sucesso',
                'nova loja: ' => $loja
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
        $loja = Loja::find($id);
        return $loja;
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
    public function update(Request $request, Loja $loja)
    {
        $validator = Validator::make($request->all(), [
            'nome' => 'required|max:40|min:3',
            'email' => 'required|email|unique:lojas,email,except,id'
        ]);

        if ($validator->fails()) {
            return response()->json(
                $validator->errors(),
                422
            );
        } else {
            $loja = $this->service->updateService($request->all(), $loja->id);
            return response()->json([
                'message' => 'Loja editada com sucesso!',
                'novo produto: ' => $loja
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Loja $loja)
    {
        $this->service->deleteService($loja->id);
        return response()->json([
            'message' => 'Loja apagada com sucesso'
        ]);
    }
}
