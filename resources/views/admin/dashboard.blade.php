@extends('layout.admin')
@section('content')
    {{-- <h1 class="text-3xl font-bold text-black">Dashboard</h1> --}}
    <div class="flex flex-col lg:flex-row lg:space-x-10 space-y-10 lg:space-y-0">
        <div class="rounded-3xl bg-slate-50 shadow-lg lg:w-3/4 w-full">
            <img src="{{ asset('image/cover.png') }}" alt="" class="rounded-3xl w-full h-auto">
            <div class="p-10 grid grid-cols-3 gap-1 ">
                <div class="flex lg:flex-row flex-col justify-center space-x-5 lg:items-start items-center">
                    <div class="flex justify-center text-center">
                        <i class="fa-solid fa-video lg:text-4xl text-3xl "></i>
                    </div>
                    <div class="text-black lg:text-lg text-xl  flex flex-col justify-center lg:items-start items-center ">
                        <h1 class="font-bold"> Genre</h1>
                        <h1> {{ $genre }} Genre</h1>
                    </div>
                </div>
                <div class="flex lg:flex-row flex-col justify-center space-x-5 lg:items-start items-center">
                    <div class="flex justify-center text-center">
                        <i class="fa-solid fa-film lg:text-4xl text-3xl"></i>
                    </div>
                    <div class="text-black lg:text-lg text-xl  flex flex-col justify-center lg:items-start items-center ">
                        <h1 class="font-bold">  Movie</h1>
                        <h1> {{ $moviestatic }} Movie</h1>
                    </div>
                </div>
                <div class="flex lg:flex-row flex-col justify-center space-x-5 lg:items-start items-center">
                    <div class="flex justify-center text-center">
                        <i class="fa-solid fa-user lg:text-4xl text-3xl"></i>
                    </div>
                    <div class="text-black lg:text-lg text-xl  flex flex-col justify-center lg:items-start items-center ">
                        <h1 class="font-bold">  Cast</h1>
                        <h1> {{ $cast }} Cast</h1>
                    </div>
                </div>

                {{-- </div> --}}
            </div>
        </div>
        <div class=" bg-slate-50  rounded-3xl shadow-lg p-10">
            <div class="flex space-x-32 lg:space-x-40">
                <h1 class="font-bold text-2xl"> Movies </h1>
                <a href="/movie"
                    class="font-semibold text-xs lg:text-lg bg-slate-300 px-4 py-2 rounded-full">Selengkapnya</a>
            </div>
            @forelse ($movie as $item)
                <div class="flex space-x-7 mt-5">
                    <img src="{{ asset('storage/' . $item->poster) }}" alt="" class="w-36 rounded-3xl h-32">
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
                            <a href="{{ route('movie.show', $item->id) }}"
                                class="px-4 py-2 bg-gray-400 text-white text-sm font-semibold shadow-lg rounded-3xl">
                                Lebih Detail</a>
                        </div>
                    </div>
                </div>
            @empty
                <h1 class="text-lg text-center font-bold"> Tidak Ada Data Terbaru</h1>
            @endforelse
        </div>
    </div>
    </div>
@endsection
