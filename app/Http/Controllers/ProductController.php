<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Product;
class ProductController extends Controller
{
    public function index()
    {
        $products = Product::paginate(12);

        return view('product.index',compact('products'));
    }

    public function detail($slug)
    {
        $product = Product::where('slug',$slug)->first();

        if(!$product){
            abort(404);
        }

        return view('product.detail',compact('product'));
    }


}
