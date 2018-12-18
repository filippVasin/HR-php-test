<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'status', 'client_email', 'partner_id', 'delivery_dt'
    ];

    public function partner()
    {
        return $this->belongsTo('App\Partner');
    }

    public function products()
    {
        return $this->belongsToMany('App\Product', 'order_products', 'order_id', 'product_id')
            ->withPivot('quantity', 'price');
    }
}
