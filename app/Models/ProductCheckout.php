<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductCheckout extends Model
{
    protected $table = 'product_checkout';

    protected $fillable = [
        'checkout_id', 'product_id', 'quantity', 'price', 'subtotal',
    ];

    public function checkout()
    {
        return $this->belongsTo(Checkout::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
