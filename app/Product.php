<?php

namespace Xtech;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';

    protected $guarded = ['id', 'created_at', 'update_at'];

    public function orders(){
        return $this->belongsToMany(Order::class, 'orders_products','product_id','order_id')->withPivot(['quantity']);
    }
}
