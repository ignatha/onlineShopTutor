<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Simple Marketplace</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @vite(['resources/css/test.css'])
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    @yield('header')
</head>
<body class="bg-gray-50">

    {{-- Navbar --}}
    <nav class="flex justify-between items-center bg-white shadow p-4">
        <div class="font-bold text-indigo-600 text-xl">MiniStore</div>
        @auth
            <div class="relative">
                <button id="cart-btn" class="relative">
                    <svg class="w-6 h-6 text-gray-700" fill="none" stroke="currentColor" stroke-width="2"
                        viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M6 6h15l-1.5 9h-13.5z" />
                        <circle cx="9" cy="21" r="1" />
                        <circle cx="20" cy="21" r="1" />
                    </svg>
                    <span id="cart-count"
                        class="-top-2 -right-2 absolute flex justify-center items-center bg-red-500 rounded-full w-5 h-5 text-white text-xs">0</span>
                </button>
            </div>
        @endauth
        @guest
            <a href="{{route('login')}}" class="bg-indigo-600 hover:bg-indigo-700 mt-2 p-2 rounded text-white buy-btn">Login</a>
        @endguest
    </nav>

    {{-- Produk List --}}
    <main class="mx-auto px-4 py-6 max-w-6xl">
        @yield('content')
    </main>

    @vite(['resources/js/app.js'])

    <script>
        $(document).ready(function(){

            var ses_success = "{{ session('success')}}";
            var ses_error = "{{ session('error')}}";
            var ses_errors = <?php echo json_encode($errors->all())?>;
            @if(session()->has('error'))
                toastr["error"](ses_error)
            @endif

            @if(session()->has('success'))
                toastr["success"](ses_success)
            @endif

            @if(session()->has('errors'))
                var next_text = ses_errors.join("<br>");
                toastr["error"](next_text)
            @endif

        });
    </script>

    @yield('footer')
</body>
</html>
