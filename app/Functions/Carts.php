<?php
namespace App\Functions;

use App\Models\Cart;
class Carts{
    public static function cart($user){


        $totalCart = ($user) ? Cart::where('user_id',$user->id)->sum('quantity') : [];

        return $totalCart;
    }
}
