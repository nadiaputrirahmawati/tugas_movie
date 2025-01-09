@extends('layout.index')
@section('content')
    <div class="lg:mt-10  lg:px-20 lg:p-3 p-0 px-0 ">
        <div class="flex space-x-6">
            <div class="lg:w-11/12 w-full ">
                <div class="carousel" id="carousel">
                    @foreach ($movie as $img)
                        <div class="carousel-item   transition-opacity duration-500 ">
                            <img src="{{ asset('storage/' . $img->poster) }}" alt="Burger" class="w-full lg:h-auto h-96" />
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="p-2 hidden lg:block">
                <h1 class="lg:text-2xl  text-xl font-bold lg:mb-4 mb-2 ">Movie Terbaru</h1>
                <div class="bg-slate-50 p-3 rounded-lg">
                    @forelse ($movie->slice(0,4) as $item)
                        <div class="flex space-x-7 mt-2">
                            <img src="{{ asset('storage/' . $item->poster) }}" alt="Movie Thumbnail"
                                class="lg:h-36 h-52 w-36 rounded-xl object-cover transition duration-300 group-hover:brightness-75">
                            <div class="mt-1">
                                <h1 class="font-semibold text-md"> {{ $item->title }} - <span
                                        class="text-sm font-normal">{{ $item->genre->name }}</span> </h1>
                                <div class="flex space-x-6 mt-2">
                                    <div class="flex space-x-2">
                                        <h1><i class="fa-solid fa-clock text-md"></i></h1>
                                        <h1> {{ $item->duration }} </h1>
                                    </div>
                                    <a href="{{ $item->trailer }}">
                                        <div class="flex space-x-2">
                                            <h1><i class="fa-solid fa-video text-md"></i></h1>
                                            <h1> Trailer</h1>
                                        </div>
                                    </a>

                                </div>
                                <div class="mt-5">
                                    <a href="{{ 'movie/detail/' . $item->id }}"
                                        class="px-4 py-2 bg-gray-400 text-white text-sm font-semibold shadow-lg rounded-3xl">
                                        Lebih Detail</a>
                                </div>
                            </div>
                        </div>
                    @empty
                        <h1 class="text-lg text-center font-bold"> Tidak Ada Data Terbaru</h1>
                    @endforelse
                    <div class="mt-5 flex">
                        <a href="/movie/all" class="font-bold text-xl"> Selengkapnya ...</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="lg:p-0 p-2 lg:block hidden">
            <h1 class="lg:text-2xl  text-xl font-bold lg:mb-4 mb-2 ">Movie Terbaru</h1>
            <div class="grid lg:grid-cols-5 grid-cols-2 gap-8 ">
                @forelse ($otherMovies as $item)
                    <div class="relative group">
                        <!-- Gambar -->
                        <img src="{{ asset('storage/' . $item->poster) }}" alt="Movie Thumbnail"
                            class="lg:h-80 h-52 w-full rounded-xl object-cover transition duration-300 group-hover:brightness-75">

                        <!-- Card Hover -->
                        <div
                            class="absolute  top-0 left-0 lg:w-72 w-full bg-white shadow-lg rounded-xl opacity-0 group-hover:opacity-100 group-hover:translate-y-[-10px] group-hover:scale-105 z-10 transition duration-300 ease-in-out flex flex-col justify-between">

                            <img src="{{ asset('storage/' . $item->poster) }}" alt="Movie Thumbnail"
                                class="lg:h-48 h-24 w-full object-cover transition duration-300 group-hover:brightness-75 rounded-se-xl rounded-tl-xl">
                            <div class="px-4 mt-2 mb-2">
                                <h2 class="lg:text-xl text-sm fonta-bold text-slate-900">{{ $item->title }}</h2>
                                <p class="text-sm mt-1 flex items-center">
                                    <span class="text-sky-950 font-bold">{{ $item->duration }}</span>
                                    <span class="ml-2 text-slate-700">| {{ $item->year }}</span>
                                </p>
                            </div>
                            <div class="flex gap-2 px-4">
                                <a href="{{ $item->trailer }}"
                                    class="px-2 py-2 flex justify-center  items-center bg-sky-900 rounded-full hover:bg-green-950"><i
                                        class="fa-solid fa-play text-white text-xs"></i></a>
                                <span
                                    class="w-full text-center px-1 py-1 bg-sky-900 rounded-full lg:text-md text-sm font-semibold text-white">{{ $item->genre->name }}</span>
                            </div>
                            <div class="mb-4 px-4 mt-2">
                                <p class="lg:text-lg text-xs mb-3 text-slate-700 truncatee">
                                    {{ $item->synopsis }} ...</p>
                                <a href="{{ '/movie/detail/' . $item->id }}"
                                    class="text-sky-900 text-sm font-semibold hover:underline"> Detail ...</a>
                            </div>
                        </div>
                        <h1 class="mt-2 font-semibold lg:text-lg text-md"> {{ $item->title }}</h1>
                        <h1 class="font-light text-md"> {{ $item->genre->name }}</h1>
                    </div>
                @empty
                    <h1 class="font-bold text-lg"> Tidak Ada Data Terbaru</h1>
                @endforelse
            </div>
        </div>
        <div class="lg:p-0 p-2 lg:hidden block">
            <h1 class="lg:text-2xl  text-xl font-bold lg:mb-4 mb-2 ">Movie Terbaru</h1>
            <div class="grid lg:grid-cols-5 grid-cols-2 gap-8 ">
                @forelse ($movie as $item)
                    <div class="relative group">
                        <!-- Gambar -->
                        <img src="{{ asset('storage/' . $item->poster) }}" alt="Movie Thumbnail"
                            class="lg:h-80 h-52 w-full rounded-xl object-cover transition duration-300 group-hover:brightness-75">

                        <!-- Card Hover -->
                        <div
                            class="absolute  top-0 left-0 lg:w-72 w-full bg-white shadow-lg rounded-xl opacity-0 group-hover:opacity-100 group-hover:translate-y-[-10px] group-hover:scale-105 z-10 transition duration-300 ease-in-out flex flex-col justify-between">

                            <img src="{{ asset('storage/' . $item->poster) }}" alt="Movie Thumbnail"
                                class="lg:h-48 h-24 w-full object-cover transition duration-300 group-hover:brightness-75 rounded-se-xl rounded-tl-xl">
                            <div class="px-4 mt-2 mb-2">
                                <h2 class="lg:text-xl text-sm fonta-bold text-slate-900">{{ $item->title }}</h2>
                                <p class="text-sm mt-1 flex items-center">
                                    <span class="text-sky-950 font-bold">{{ $item->duration }}</span>
                                    <span class="ml-2 text-slate-700">| {{ $item->year }}</span>
                                </p>
                            </div>
                            <div class="flex gap-2 px-4">
                                <a href="{{ $item->trailer }}"
                                    class="px-2 py-2 flex justify-center  items-center bg-sky-900 rounded-full hover:bg-green-950"><i
                                        class="fa-solid fa-play text-white text-xs"></i></a>
                                <span
                                    class="w-full text-center px-1 py-1 bg-sky-900 rounded-full lg:text-md text-sm font-semibold text-white">{{ $item->genre->name }}</span>
                            </div>
                            <div class="mb-4 px-4 mt-2">
                                <p class="lg:text-lg text-xs mb-3 text-slate-700 truncatee">
                                    {{ $item->synopsis }} ...</p>
                                <a href="{{ '/movie/detail/' . $item->id }}"
                                    class="text-sky-900 text-sm font-semibold hover:underline"> Detail ...</a>
                            </div>
                        </div>
                        <h1 class="mt-2 font-semibold lg:text-lg text-md"> {{ $item->title }}</h1>
                        <h1 class="font-light text-md"> {{ $item->genre->name }}</h1>
                    </div>
                @empty
                    <h1 class="font-bold text-lg"> Tidak Ada Data Terbaru</h1>
                @endforelse
            </div>
        </div>

        @include('pages.movieRomance')
        @include('pages.movieall')



    </div>



    <style>
        .carousel-item {
            display: none;
        }

        .owl-carousel .owl-item {
            box-shadow: none;
            /* Menghapus shadow */
        }

        .carousel-item-visible {
            display: block;
        }

        .truncatee {
            display: -webkit-box;
            -webkit-box-orient: vertical;
            overflow: hidden;
            text-overflow: ellipsis;
            -webkit-line-clamp: 3;
            /* Batasi hingga 3 baris */
            /* max-height: 4.5rem; */
            /* Sesuaikan dengan tinggi baris */
        }
    </style>
    <script>
        const carousel = document.getElementById('carousel');
        const items = carousel.querySelectorAll('.carousel-item');
        let currentIndex = 0;

        function showNextSlide() {
            items[currentIndex].classList.remove('carousel-item-visible');
            currentIndex = (currentIndex + 1) % items.length;
            items[currentIndex].classList.add('carousel-item-visible');
        }

        items[currentIndex].classList.add('carousel-item-visible');
        setInterval(showNextSlide, 3000);
    </script>
@endsection
