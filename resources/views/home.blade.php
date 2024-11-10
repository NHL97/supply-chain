<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<header class="grid grid-cols-2 items-center gap-2 py-10 lg:grid-cols-3">
    @if (Route::has('login'))
        <nav class="flex flex-1 justify-center space-x-4">
            <!-- Links for Supplier, Product, Cart -->
            @if (!Auth::check())
                <a href="\supplier"
                   class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
                   Supplier
                </a>

                <a href="\product"
                   class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
                   Product
                </a>

                <a href="\cart"
                   class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
                   Cart
                </a>
            @endif
        </nav>

        <nav class="flex justify-end space-x-4">
            <!-- Links for Login and Register -->
            @auth
                <a href="{{ url('/dashboard') }}"
                   class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
                   Dashboard
                </a>
            @else
                <a href="{{ route('login') }}"
                   class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
                   Log in
                </a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}"
                       class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
                       Register
                    </a>
                @endif
            @endauth
        </nav>
    @endif

</header>
<main>

</main>
</html>
