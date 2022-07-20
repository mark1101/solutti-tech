@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Criar novo produto</div>

                    <div class="card-body">
                        <product-create> </product-create>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
