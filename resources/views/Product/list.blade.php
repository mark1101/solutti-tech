@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Produtos Criados</div>

                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Nome</th>
                                    <th scope="col">Descrição</th>
                                    <th scope="col">Marca</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $product)
                                    <tr>
                                        <th scope="row">{{ $product->id }}</th>
                                        <td>{{ $product->name }}</td>
                                        <td>{{ $product->description }}</td>
                                        <td>{{ $product->brand->name }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <!-- <product-list> </product-list> -->
                    </div>

                    <div class="card-footer">
                        <a href="{{ route('product.create') }}" class="btn btn-primary">Cadastrar produto</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
