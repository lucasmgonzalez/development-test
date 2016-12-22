<?php

namespace Xtech\Http\Controllers;

use Xtech\Http\Requests\Product\CreateRequest;
use Xtech\Http\Requests\Product\DeleteRequest;
use Xtech\Http\Requests\Product\UpdateRequest;
use Xtech\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function create(CreateRequest $request)
    {
        $inputs = $request->except('_token');

        $product = Product::create($inputs);

        return $product;
    }

    public function update(UpdateRequest $request, Product $product)
    {
        $inputs = $request->except('_token');

        $product->update($inputs);

        return $product;
    }

    public function delete(DeleteRequest $request, Product $product)
    {
        $product->delete();

        return $product;
    }
}
