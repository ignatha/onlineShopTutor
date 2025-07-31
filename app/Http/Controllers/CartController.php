<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Support\Facades\{Crypt};

use App\Models\{Product,Cart};
class CartController extends Controller implements HasMiddleware
{

    public static function middleware(): array
    {
        return [
            'auth'
        ];
    }

    public function store(Request $request)
    {
        $request->validate([
            'qty' => ['required'],
            'product'   => ['required']
        ]);

        try {
            $id = Crypt::decryptString($request->product);
        } catch (\Throwable $th) {
            return redirect()->back()->with('error','invalid product');
        }

        $product = Product::find($id);

        if ($request->qty <= 0) {
            return redirect()->back()->with('error','invalid product');
        }

        if ($request->qty > $product->stock) {
           return redirect()->back()->with('error','not enough stock');
        }

        $cart = Cart::where('product_id',$product->id)->where('user_id',auth()->user()->id)->first();

        if(!$cart){
            Cart::create([
                'user_id' => auth()->user()->id,
                'product_id' => $product->id,
                'quantity' => $request->qty,
            ]);

            return redirect()->back()->with('success','Success menambahkan ke keranjang');
        }

        $cart->quantity = $request->qty;
        $cart->save();

        return redirect()->back()->with('success','Success menambahkan ke keranjang');
    }
}
