@extends('layout')
@section('content')
    <h1 class="mb-4 font-semibold text-gray-800 text-2xl">All Products</h1>

        <div class="gap-6 grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
            @foreach ($products as $product)
                <div class="bg-white shadow hover:shadow-lg p-4 rounded-lg transition">
                    <a href="{{route('product.detail',$product->slug)}}"><img src="{{ $product->image }}" alt="{{ $product->name }}"
                         class="mb-3 rounded-md w-full h-40 object-cover"></a>
                    <h2 class="font-semibold text-gray-800 text-sm"><a href="{{route('product.detail',$product->slug)}}">{{ $product->name }}</a></h2>
                    <p class="font-bold text-indigo-600 text-md">Rp {{ number_format($product->price, 0, ',', '.') }}</p>
                    <span class="font-light text-gray-300 text-xs">Stock : {{$product->stock}}</span>
                    <button onclick="openModal()" class="bg-indigo-600 hover:bg-indigo-700 mt-2 py-1 rounded w-full text-white buy-btn"
                            >
                        Add to Cart
                    </button>
                </div>
            @endforeach
        </div>

        <div class="py-4 w-full">
            {{$products->links('vendor.pagination.tailwind')}}
        </div>

        <!-- Modal -->
<div id="myModal" class="hidden z-50 fixed inset-0 flex justify-center items-center bg-black/65 bg-opacity-50">
    <div class="relative bg-white shadow-xl p-6 rounded-lg w-full max-w-md">
        <h2 class="mb-4 font-bold text-xl">Add to cart</h2>
        <div class="w-full fl">
            <div class="flex flex-col">
                    <input type="number" name="qty" class="border border-black border-solid" >
                    <button class="bg-indigo-600 hover:bg-indigo-700 mt-2 py-1 rounded text-white buy-btn"
                                >
                            Add to Cart
                        </button>
                </div>
        </div>

        <!-- Action Buttons -->
        <div class="flex justify-end gap-2 mt-2">
            <button onclick="closeModal()" class="bg-gray-300 hover:bg-gray-400 px-4 py-2 rounded">
                Cancel
            </button>
            <button class="bg-blue-600 hover:bg-blue-700 px-4 py-2 rounded text-white">
                Confirm
            </button>
        </div>

        <!-- Close Button (top-right X) -->
        <button onclick="closeModal()" class="top-2 right-2 absolute text-gray-500 hover:text-gray-700 text-2xl leading-none">&times;</button>
    </div>
</div>
@endsection

@section('footer')
<script>
    function openModal() {
        document.getElementById('myModal').classList.remove('hidden');
    }

    function closeModal() {
        document.getElementById('myModal').classList.add('hidden');
    }
</script>

@endsection
