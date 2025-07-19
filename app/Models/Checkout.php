<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Checkout extends Model
{
    protected $fillable = [
        'user_id', 'total_price', 'status', 'payment_method', 'shipping_address',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function productCheckouts()
    {
        return $this->hasMany(ProductCheckout::class);
    }
}
