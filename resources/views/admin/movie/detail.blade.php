@extends('layout.admin')
@section('content')
    <div>
        <h1 class="text-3xl font-bold text-black mb-4"> Detail Movie </h1>
        <div class="rounded-3xl bg-slate-50 shadow-lg p-10">
            <div class="flex lg:space-x-8 space-x-0 flex-col lg:flex-row ">
                <img src="{{ asset('storage/' . $movie->poster) }}" alt="" class="h-11/12 lg:w-96 w-full  rounded-3xl">
                <div class="mt-5">
                    <div class="flex space-x-3">
                        {{-- <h1><i class="fa-solid fa-calendar-week"></i></h1> --}}
                        <h1>{{ $movie->year }}</h1>
                    </div>
                    <h1 class="text-3xl font-extrabold"> {{ $movie->title }} </h1>
                    <div class="flex space-x-4 mt-3">
                        <h1 class="px-4 py-1 rounded-full bg-red-300 text-white text-lg font-semibold">
                            {{ $movie->genre->name }}</h1>
                        <a href="#" class="px-4 py-1 rounded-full bg-primary text-sky-950 text-lg font-semibold"
                            onclick="my_modal_3.showModal()">
                            Tambah Cast</a>
                    </div>
                    <p class="text-md mt-3"> {{ $movie->synopsis }}</p>
                    <a href="{{ $movie->trailer}}">
                        <div class="mt-4 flex space-x-3">
                            <h1><i class="fa-solid fa-play text-2xl"></i></h1>
                            <h1 class="text-xl font-semibold">Play Trailer</h1>
                        </div>
                    </a>
                </div>
            </div>
            @include('components.alert')
            <h1 class="text-2xl mb-4  font-semibold mt-4"> Pemeran </h1>
            <div class="grid lg:grid-cols-7 gap-4 grid-cols-2">
                @forelse ($movie['cast'] as $item)
                    <div class="bg-slate-100">
                        <img src="{{ asset('storage/' . $item->avatar) }}" alt="avatar-cast" class="h-44 w-full ">
                        <div class="p-3">
                            <h1 class=" text-sky-950 font-semibold text-md"> {{ $item->name }}</h1>
                            <h1 class=" text-sky-950 font-semibold text-sm"> {{ $item->biodata }}</h1>
                        </div>
                    </div>
                @empty
                @endforelse
            </div>
        </div>
    </div>

    <dialog id="my_modal_3" class="modal">
        <div class="modal-box text-lg font-semibold w-3/4 max-w-2xl mx-auto p-8">
            <form id="castForm" action="{{ route('cast.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <h3 class="text-xl font-bold text-center mb-2"> Cast - {{ $movie->title }} </h3>
                <input type="hidden" name="movie_id" value="{{ $movie->id }}">
                <button type="button" id="closeModal"
                    class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>

                <div class="grid grid-cols-2 gap-3">
                    <div>
                        <span> Name </span>
                        <input type="text" name="name" id="name" placeholder="Masukan Nama ..."
                            class="input input-bordered w-full mt-2 bg-slate-50 rounded-full border-gray-500 border-2">
                    </div>
                    <div>
                        <span> Age </span>
                        <input type="number" name="age" id="age" placeholder="Masukan Tahun ..."
                            class="input input-bordered w-full mt-2 bg-slate-50 rounded-full border-gray-500 border-2">
                    </div>
                    <div>
                        <span class="text-black text-xl"> Biodata </span>
                        <textarea class="textarea textarea-bordered w-full mt-3 bg-slate-50 rounded-2xl border-gray-300 border-2" name="biodata"
                            placeholder="Bio"></textarea>
                    </div>
                    <div class="flex items-center justify-center w-full h-full">
                        <label for="file"
                            class="cursor-pointer bg-slate-50 w-full h-full flex flex-col items-center justify-center p-1 rounded-3xl border-2 border-dashed border-gray-500 shadow-lg">
                            <div class="flex flex-col items-center justify-center gap-2">
                                <i class="fa-solid fa-image text-3xl"></i>
                                <p class="text-center text-sm font-semibold">Click To Upload Image</p>
                            </div>
                            <input type="file" id="file" name="avatar" class="hidden">
                        </label>
                    </div>
                </div>
                <div class="mt-4">
                    <button class="bg-primary px-3 py-2 text-lg rounded-full w-full" type="submit"> Kirim ..... </button>
                </div>
            </form>
        </div>
    </dialog>

    <script>
        // Close modal and reset form
        document.getElementById('closeModal').addEventListener('click', () => {
            const modal = document.getElementById('my_modal_3');
            const form = document.getElementById('castForm');
            form.reset(); // Reset form inputs
            modal.close(); // Close modal
        });
    </script>
@endsection
