<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    protected $fillable = [
        'name', 'price'
    ];

    public function vendor()
    {
        return $this->belongsTo('App\Vendor');
    }

    public function orders()
    {
        return $this->belongsToMany('App\Order');
    }
}
