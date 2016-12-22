@extends('templates.app')

@section('content')
    <div class="col-md-8 col-md-offset-2">
        <h1>Produtos</h1>
        <div class="panel">
            <div class="panel-body">
                <div class="col-md-12">
                    <a href="{{ action('AppController@createProduct') }}" class="btn btn-info btn-raised pull-right">
                        Criar Produto
                    </a>
                </div>
                <table class="table table-hover">
                    <thead>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Quantidade</th>
                        <th>Preço</th>
                        <th></th>
                    </thead>
                    <tbody>
                        @foreach($products as $product)
                            <tr>
                                <td>{{ $product->id }}</td>
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->stock_quantity }}</td>
                                <td>{{ $product->price }}</td>
                                <td>
                                    <a href="{{ action('AppController@retrieveProduct', ['product' => $product]) }}">
                                        <i class="material-icons">edit</i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@stop