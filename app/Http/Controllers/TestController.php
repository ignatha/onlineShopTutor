<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Product;
class TestController extends Controller
{
    public function index()
    {
        $products = Product::paginate(12);

        return view('test',compact('products'));
    }
}
