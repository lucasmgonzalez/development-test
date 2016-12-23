@extends('templates.app')

@section('content')
    <div class="col-md-8 col-md-offset-2">
        <h1>Criar Produto</h1>
        <div class="panel">
            <div class="panel-body">
                <form action="{{ action('ProductController@create') }}"
                      data-redirect="{{ action('AppController@products') }}"
                      id="create-product"
                      class="form">
                    {{ csrf_field() }}

                    <div class="form-group">
                        <label for="create-product-name" class="control-label">Nome</label>
                        <input type="text" name="name" id="create-product-name" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="create-product-stock_quantity" class="control-label">Quantidade no estoque</label>
                        <input type="text"
                               name="stock_quantity"
                               id="create-product-stock_quantity"
                               data-mask="0#"
                               class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="create-product-price" class="control-label">Preço</label>
                        <input type="text"
                               name="price"
                               id="create-product-price"
                               data-mask="#0.00"
                               data-mask-reverse="true"
                               class="form-control">
                    </div>
                    
                    <div class="form-group">
                        <input type="submit" value="Criar" class="btn btn-success pull-right">
                        <div class="clearfix"></div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop