@extends('layout.index')

@section('content')
    <div class="lg:px-20 px-2 pt-3 mb-20">
        <div class="rounded-3xl bg-slate-50 shadow-lg p-10">
            <div class="flex lg:space-x-8 space-x-0 flex-col lg:flex-row ">
                <img src="{{ asset('storage/' . $movie->poster) }}" alt="" class="h-11/12 lg:w-96 w-full rounded-3xl">
                <div class="mt-14">
                    <h1 class="text-3xl font-extrabold"> {{ $movie->title }} ( {{ $movie->year }} ) </h1>
                    <div class="flex space-x-4 mt-3">
                        <h1 class="px-4 py-1 rounded-full bg-red-300 text-white lg:text-lg text-md font-semibold">
                            {{ $movie->genre->name }}</h1>
                        <a href="{{ $movie->trailer }}">
                            <div
                                class=" flex space-x-3 px-3 py-1 rounded-full bg-primary text-sky-950 text-lg font-semibold">
                                <h1><i class="fa-solid fa-play text-lg"></i></h1>
                                <h1 class="lg:text-xl text-sm font-semibold">Play Trailer</h1>
                            </div>
                        </a>
                    </div>
                    <h1 class="mt-4 font-semibold"> Synopsis</h1>
                    <p class="text-md mt-2"> {{ $movie->synopsis }}</p>
                </div>
            </div>
            <h1 class="text-2xl mb-4  font-semibold mt-4"> Cast-Cast </h1>
            <div class="overflow-x-auto mt-3 scrollbar-thin">
                <div class="inline-flex gap-4">
                    @forelse ($movie['cast'] as $item)
                        <div class="bg-slate-100 w-48 flex-shrink-0">
                            <img src="{{ asset('storage/' . $item->avatar) }}" alt="avatar-cast" class="h-44 w-full">
                            <div class="p-3">
                                <h1 class="text-sky-950 font-semibold text-md">{{ $item->name }}</h1>
                                <h1 class="text-sky-950 font-semibold text-sm">{{ $item->biodata }}</h1>
                            </div>
                        </div>
                    @empty
                        <p>No cast available</p>
                    @endforelse
                </div>
            </div>


        </div>
    </div>

    <style>
        .scrollbar-thin {
            scrollbar-width: thin;
        }

        .scrollbar-thin::-webkit-scrollbar {
            height: 6px;
            /* Untuk scrollbar horizontal */
            background-color: #f1f1f1;
        }

        .scrollbar-thin::-webkit-scrollbar-thumb {
            background-color: #888;
            border-radius: 4px;
        }
    </style>
@endsection
