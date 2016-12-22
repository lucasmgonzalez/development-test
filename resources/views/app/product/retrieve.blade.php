@extends('templates.app')

@section('content')
    <div class="col-md-8 col-md-offset-2">
        <h1>Produto: {{ $product->name }}</h1>
        <div class="panel">
            <div class="panel-body">
                <form action="{{ action('ProductController@update', ['product' => $product]) }}"
                      data-redirect="{{ action('AppController@retrieveProduct', ['product' => $product]) }}"
                      id="update-product"
                      class="form">
                    {{ csrf_field() }}

                    <div class="form-group">
                        <label for="update-product-name" class="control-label">Nome</label>
                        <input type="text" name="name" id="update-product-name" class="form-control" value="{{ $product->name }}">
                    </div>

                    <div class="form-group">
                        <label for="update-product-stock_quantity" class="control-label">Quantidade no estoque</label>
                        <input type="text" name="stock_quantity" id="update-product-stock_quantity" class="form-control" value="{{ $product->stock_quantity }}">
                    </div>

                    <div class="form-group">
                        <label for="update-product-price" class="control-label">Preço</label>
                        <input type="text" name="price" id="update-product-price" class="form-control" value="{{ $product->price }}">
                    </div>

                    <div class="form-group">
                        <input type="submit" value="Salvar" class="btn btn-success pull-right">
                        <label for="delete-product-submit"
                               class="btn btn-danger btn-raised"
                               onclick="return confirm('Você realmente deseja excluir esse produto?')">
                            Excluir produto
                        </label>
                        <div class="clearfix"></div>
                    </div>
                </form>
                <form action="{{ action('ProductController@delete', ['product' => $product]) }}"
                      data-redirect="{{ action('AppController@products') }}"
                      method="POST"
                      class="hidden"
                      id="delete-product">
                    {{ csrf_field() }}
                    <input type="submit" value="Deletar" id="delete-product-submit">
                </form>
            </div>
        </div>
    </div>
@stop