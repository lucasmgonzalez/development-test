@extends('templates.app')

@section('content')
    <div class="col-md-8 col-md-offset-2">
        <div class="panel">
            <div class="panel-body">
                <table class="table table-hover">
                    <thead>
                        <th>ID</th>
                        <th>Valor total</th>
                        <th>Produtos</th>
                    </thead>
                    <tbody>
                        @foreach($orders as $order)
                            <tr>
                                <td>{{ $order->id }}</td>
                                <td>{{ $order->total_value }}</td>
                                <td>
                                    <ul>
                                        @foreach($order->products as $product)
                                            <li>{{ $product->pivot->quantity }} - {{ $product->name }}</li>
                                        @endforeach
                                    </ul>

                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@stop