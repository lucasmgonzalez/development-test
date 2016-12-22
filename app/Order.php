<?php

namespace Xtech;

use Illuminate\Database\Eloquent\Model;
use Watson\Rememberable\Rememberable;

class Order extends Model
{
    use Rememberable;

    protected $table = 'orders';

    protected $fillable = [ 'total_value' ];

    public static function generate(){
        $order = new Order(['total_value' => 0]);
        $order->save();

        $products = Product::where('stock_quantity','>',0)->get();

        $number_of_different_products = rand(1,$products->count());

        $order_products = $products->shuffle()->take($number_of_different_products);

        foreach($order_products as $product){

            $qtd = rand(1,$product->stock_quantity);

            $product->stock_quantity -= $qtd;
            $product->save();

            $order->products()->attach($product->id,['quantity' => $qtd]);

            $order->total_value += $product->price * $qtd;

        }

        $order->save();

        return $order;
    }
    
    public function products(){
        return $this->belongsToMany(Product::class, 'orders_products','order_id','product_id')->withPivot(['quantity']);
    }
}
