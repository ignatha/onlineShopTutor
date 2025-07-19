<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Simple Marketplace</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @vite(['resources/css/test.css'])
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
</head>
<body class="bg-gray-50">

    {{-- Navbar --}}
    <nav class="bg-white shadow p-4 flex justify-between items-center">
        <div class="text-xl font-bold text-indigo-600">MiniStore</div>
        <div class="relative">
            <button id="cart-btn" class="relative">
                <svg class="w-6 h-6 text-gray-700" fill="none" stroke="currentColor" stroke-width="2"
                     viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M6 6h15l-1.5 9h-13.5z" />
                    <circle cx="9" cy="21" r="1" />
                    <circle cx="20" cy="21" r="1" />
                </svg>
                <span id="cart-count"
                      class="absolute -top-2 -right-2 bg-red-500 text-white text-xs w-5 h-5 flex items-center justify-center rounded-full">0</span>
            </button>
        </div>
    </nav>

    {{-- Produk List --}}
    <main class="max-w-6xl mx-auto py-6 px-4">
        <h1 class="text-2xl font-semibold mb-4 text-gray-800">All Products</h1>

        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @foreach ($products as $product)
                <div class="bg-white p-4 rounded-lg shadow hover:shadow-lg transition">
                    <img src="{{ $product->image }}" alt="{{ $product->name }}"
                         class="w-full h-40 object-cover rounded-md mb-3">
                    <h2 class="text-gray-800 font-semibold text-sm">{{ $product->name }}</h2>
                    <p class="text-indigo-600 font-bold text-md">Rp {{ number_format($product->price, 0, ',', '.') }}</p>
                    <button class="mt-2 w-full bg-indigo-600 hover:bg-indigo-700 text-white py-1 rounded buy-btn"
                            data-name="{{ $product->name }}">
                        Add to Cart
                    </button>
                </div>
            @endforeach
        </div>

            {{$products->simpleLinks()}}
    </main>

    {{-- Script --}}
    <script>
        let cartCount = 0;
        $('.buy-btn').click(function () {
            const productName = $(this).data('name');
            cartCount++;
            $('#cart-count').text(cartCount);
            alert(productName + " added to cart!");
        });
    </script>

</body>
</html>
