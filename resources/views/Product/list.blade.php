@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Produtos Criados</div>

                    <div class="card-body">
                         <product-list> </product-list>
                    </div>

                    <div class="card-footer">
                        <a href="{{ route('product.create') }}" class="btn btn-primary">Cadastrar produto</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
