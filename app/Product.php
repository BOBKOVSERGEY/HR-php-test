<?php

namespace App;

use App\Filters\Filterable;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use Filterable;
    protected $fillable = ['price'];

    //
    public function vendor()
    {
        return $this->belongsTo(Vendor::class);
    }
}
