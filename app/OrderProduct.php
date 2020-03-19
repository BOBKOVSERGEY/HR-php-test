<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderProduct extends Model
{
    public function product()
    {
        return $this->hasOne(Product::class, 'id', 'product_id');
    }
}
