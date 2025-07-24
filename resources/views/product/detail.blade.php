@extends('layout')
@section('content')
    <div class="bg-white shadow p-4 rounded-sm w-full">
        <div class="flex">
            <img class="w-[200px]" src="{{$product->image}}" alt="{{$product->name}}">
            <div class="flex flex-col gap-y-2 p-4">
                <h1 class="font-semibold text-gray-800 text-2xl">{{$product->name}}</h1>
                <span class="font-bold text-indigo-600 text-lg">Rp {{ number_format($product->price, 0, ',', '.') }}</span>
                <span class="font-light text-gray-300 text-xs">Stock : {{$product->stock}}</span>
                <form class="flex flex-col" action="{{route('cart.store')}}" method="POST">
                    @csrf
                    <input type="number" min="0" name="qty" class="border border-black border-solid" >
                    <input type="hidden" name="product" value="{{encrypt($product->id)}}">
                    <input type="submit" class="bg-indigo-600 hover:bg-indigo-700 mt-2 py-1 rounded text-white buy-btn" value="Add to cart">
                </form>
            </div>
        </div>
        <div>
            {!!$product->description!!}
        </div>
    </div>

@endsection
