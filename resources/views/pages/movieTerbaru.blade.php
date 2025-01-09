@extends('layout.index')

@section('content')
    <div class="px-2 pt-6 lg:px-20 mb-14">
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

                    <h1 class="font-light text-md">
                        @foreach ($item['cast'] as $cast)
                        {{ $cast->name . ','}}
                        @endforeach
                    </h1>
                </div>
            @empty
                <h1 class="font-bold text-lg"> Tidak Ada Data Terbaru</h1>
            @endforelse
        </div>
    </div>
@endsection

<style>
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
