<?php

namespace Xtech;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';

    protected $guarded = ['id', 'created_at', 'update_at'];
}
