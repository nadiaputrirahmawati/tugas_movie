<div class="bg-slate-100 shadow-lg mt-12  p-4 rounded-3xl">
    <h1 class="lg:text-xl text-xl font-bold">Movie Romance</h1>
    <div class="overflow-x-auto">
        <div class="inline-flex gap-4 mb-12">
            @forelse ($romanceMovies as $dataa)
                <div class="relative group">
                    <!-- Gambar -->
                    <img src="{{ asset('storage/' . $dataa->poster) }}" alt="Movie Thumbnail"
                        class="lg:h-full h-full  lg:w-36 w-36 rounded-xl object-cover transition duration-300 group-hover:brightness-75">

                    <!-- Card Hover -->
                    <div
                        class="absolute top-0 left-0 lg:w-36 w-36 bg-transparent shadow-lg rounded-xl opacity-0 group-hover:opacity-100 group-hover:translate-y-[-10px] group-hover:scale-105 transition duration-300 ease-in-out flex flex-col justify-center items-center h-full">
                        <div class="flex gap-2 p-8">
                            <a href="{{ $dataa->trailer }}"
                                class="px-2 py-1 flex justify-center items-center bg-sky-900 rounded-full hover:bg-green-950"><i
                                    class="fa-solid fa-play text-white text-xs"></i></a>
                            <a href="{{ 'movie/detail/'. $dataa->id }}"
                                class="w-full text-center py-1 px-3 bg-sky-900 rounded-full lg:text-xs text-xs font-medium lg:font-semibold text-white">Detail</a>
                        </div>
                    </div>
                    <h1 class="mt-2 font-semibold lg:text-sm text-xs w-36"> {{ $dataa->title }}</h1>
                </div>
            @empty
            @endforelse
        </div>
    </div>
</div>
