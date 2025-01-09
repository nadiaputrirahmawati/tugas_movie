<div class="p-2 lg:p-4">
    <h1 class="lg:text-2xl  text-xl font-bold lg:mb-3 mb-2">Movie All</h1>
    <div class="grid lg:grid-cols-6 grid-cols-3 gap-2 ">
        @forelse ($otherMovies as $data)
            <div class="relative group">
                <!-- Gambar -->
                <img src="{{ asset('storage/' . $data->poster) }}" alt="Movie Thumbnail"
                    class="lg:h-72 h-40 w-full rounded-xl object-cover transition duration-300 group-hover:brightness-75">

                <!-- Card Hover -->
                <div
                    class="absolute  top-0 left-0 lg:w-64 w-32 bg-white shadow-lg rounded-xl opacity-0 group-hover:opacity-100 group-hover:translate-y-[-10px] group-hover:scale-105 z-10 transition duration-300 ease-in-out flex flex-col justify-between">

                    <img src="{{ asset('storage/' . $data->poster) }}" alt="Movie Thumbnail"
                        class="lg:h-48 h-24 w-full object-cover transition duration-300 group-hover:brightness-75 rounded-se-xl rounded-tl-xl">
                    <div class="px-2 lg:mt-2 mt-5 mb-2">
                        <h2 class="lg:text-xl text-sm fonta-bold text-slate-900">{{ $data->title }}</h2>
                        <p class="lg:text-sm text-xs mt-1 flex items-center">
                            <span class="text-sky-950 font-bold">{{ $data->duration }}</span>
                            <span class="ml-2 text-slate-700">| {{ $data->year }}</span>
                        </p>
                    </div>
                    <div class="flex gap-2 px-2">
                        <a href="{{ $data->trailer }}"
                            class="px-2 py-1 flex justify-center items-center bg-sky-900 rounded-full hover:bg-green-950"><i
                                class="fa-solid fa-play text-white text-xs"></i></a>
                        <span
                            class="w-full text-center px-1 py-1 bg-sky-900 rounded-full lg:text-md text-sm font-medium text-white">{{ $data->genre->name }}</span>
                    </div>
                    <div class="mb-4 px-2 mt-2">
                        <p class="lg:text-lg text-xs mb-3 text-slate-700 truncatee">
                            {{ $data->synopsis }} ...</p>
                        <a href="{{ '/movie/detail/' . $data->id }}" class="text-sky-900 text-sm lg:text-lg font-semibold hover:underline"> Detail ...</a>
                    </div>
                </div>
                <h1 class="mt-2 font-semibold lg:text-lg text-xs"> {{$item->title}}</h1>
            </div>
        @empty
        @endforelse
    </div>
    <div class="flex justify-center mt-10">
        <a href="/movie/all" class="font-semibold bg-sky-900 text-white px-3 rounded-full py-3"> Selengkap nya ...</a>
    </div>
</div>