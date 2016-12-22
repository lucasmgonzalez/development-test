<?php

namespace Xtech\Http\Controllers;

use Xtech\Product;
use Illuminate\Http\Request;

class AppController extends Controller
{
    public function index(){
        return view('app.index');
    }

    public function createProduct(){
        return view('app.product.create');
    }

    public function retrieveProduct(Product $product){
        return view('app.product.retrieve')->with([
            'product' => $product
        ]);
    }

    public function products(){
        return view('app.product.all')->with([
            'products' => Product::all()
        ]);
    }
}

