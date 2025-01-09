<!doctype html>
<html lang="en" data-theme="nord">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
    <!-- Owl Carousel CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide/dist/css/splide.min.css">
    <script src="https://cdn.jsdelivr.net/npm/@splidejs/splide/dist/js/splide.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
</head>

<body>
    <div class="h-screen flex justify-center items-center p-3">
        <div class="rounded-3xl bg-slate-100 p-8 shadow-lg lg:w-96 w-full">
            <h1 class="text-2xl font-bold mb-4 text-center">Login </h1>
            @if ($errors->any())
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                    @foreach ($errors->all() as $error)
                        <p>{{ $error }}</p>
                    @endforeach
                </div>
            @endif
            <form action="{{ route('login') }}" method="post">
                @csrf
                <div class="flex flex-col">
                    <span> Email</span>
                    <input type="email" name="email" id="email" class=" w-full rounded-3xl p-2 shadow">
                </div>
                <div class="flex flex-col mt-5">
                    <span> Password</span>
                    <input type="password" name="password" id="password" class=" w-full rounded-3xl p-2 shadow">
                </div>
                <div class="mt-4 flex justify-center">
                    <button type="submit" class="bg-secondary px-10 text-white font-bold py-1 rounded-3xl shadow-lg">
                        Login</button>
                </div>
            </form>

        </div>
    </div>

</body>

</html>
