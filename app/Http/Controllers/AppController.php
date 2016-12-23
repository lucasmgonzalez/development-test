<?php

namespace Xtech\Http\Controllers;

use Xtech\Order;
use Xtech\Product;
use Illuminate\Http\Request;

class AppController extends Controller
{
    public function index()
    {
        //return view('app.index');
        return redirect()->action('AppController@orders');
    }

    public function createProduct()
    {
        return view('app.product.create');
    }

    public function retrieveProduct(Product $product)
    {
        return view('app.product.retrieve')->with([
            'product' => $product
        ]);
    }

    public function products()
    {
        return view('app.product.all')->with([
            'products' => Product::all()
        ]);
    }

    public function orders()
    {
        $orders = Order::orderBy('created_at','desc')
                       ->with(['products' => function($q){ $q->remember(30); }])
                       ->remember(30)
                       ->get();

        return view('app.order.all')->with([
            'orders' => $orders
        ]);
    }
}

