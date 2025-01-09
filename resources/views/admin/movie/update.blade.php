@extends('layout.admin')
@section('content')
    <h1 class="text-3xl font-bold text-black mb-4"> Update Movie </h1>
    @include('components.alert')
    <div class="card rounded-3xl bg-slate-50 p-8 shadow-lg text-black">
        <form action="{{ route('movie.update', $movie->id) }}" enctype="multipart/form-data" method="POST">
            @csrf
            @method('PUT')
            <div class="mt-5 grid lg:grid-cols-2 grid-rows-1 gap-4">
                <div>
                    <div class="grid grid-cols-2 gap-3">
                        <div>
                            <span class="text-black text-lg"> Title </span>
                            <input type="text" name="title" id="title" placeholder="Masukan Genre Movie ..."
                                class="input input-bordered w-full mt-3 bg-slate-50 rounded-full border-gray-300 border-2 "
                                value="{{ old('title', $movie->title) }}">
                        </div>
                        <div>
                            <span class="text-black text-lg"> Year </span>
                            <input type="text" name="year" id="year" placeholder="Masukan Genre Movie ..."
                                class="input input-bordered w-full mt-3 bg-slate-50 rounded-full border-gray-300 border-2"
                                value="{{ old('title', $movie->year) }}">
                        </div>
                    </div>
                    <div class="grid grid-cols-2 gap-3 mt-4">
                        <div>
                            <span class="text-black text-lg"> Genre </span>
                            <select
                                class="select select-bordered text-lg font-semibold text-sky-950 w-full mt-3 rounded-full bg-white border-gray-300 border-2"
                                name="genre_id">
                                <option disabled selected>Pilih Genre?</option>
                                @forelse ($genre as $data)
                                    <option value="{{ $data->id }}"
                                        {{ old('genre_id', $movie->genre_id) == $data->id ? 'selected' : '' }}
                                        class="text-lg text-sky-950">
                                        {{ $data->name }}
                                    </option>
                                @empty
                                    <option value=""> Tidak Ada Genre</option>
                                @endforelse
                            </select>

                        </div>
                        <div>
                            <span class="text-black text-lg"> Trailer </span>
                            <input type="text" name="trailer" id="trailer" placeholder="Masukan Genre Movie ..."
                                class="input input-bordered w-full mt-3 bg-slate-50 rounded-full border-gray-300 border-2" value="{{ old('title', $movie->trailer) }}">
                        </div>

                    </div>
                    <div class="grid grid-cols-2 gap-3 mt-4">

                        <div>
                            <span class="text-black text-lg"> Duration </span>
                            <input type="text" name="duration" id="duration" placeholder="Masukan Genre Movie ..."
                                class="input input-bordered w-full mt-3 bg-slate-50 rounded-full border-gray-300 border-2" value="{{ old('title', $movie->duration) }}"
                                value="{{ old('title', $movie->year) }}">
                        </div>
                        <div class=" flex space-x-2 mt-6">

                            <input type="checkbox" class="toggle toggle-info bg-white mt-9" checked="checked"
                                name="available" />
                            <span class="text-black mt-10 text-md"> *Available </span>
                        </div>
                    </div>


                    <div class="mt-4">
                        <span class="text-black text-lg"> Synopsis </span>
                        <textarea class="textarea textarea-bordered text-lg h-28 w-full mt-3 bg-slate-50 rounded-2xl border-gray-300 border-2"
                            name="synopsis" placeholder="Bio">{{ old('title', $movie->synopsis) }}</textarea>
                    </div>
                </div>
                <div class="flex items-center justify-center w-full h-full">
                    <label for="file"
                        class="cursor-pointer bg-slate-50  w-full flex flex-col items-center justify-center p-6 rounded-3xl border-2 border-dashed border-gray-500 shadow-lg">
                        <div class="flex flex-col items-center justify-center gap-2">
                            <img id="imagePreview" src="{{ asset('storage/' . $movie->poster) }}" alt="Preview"
                                class="h-1/2 w-60 object-cover mb-4">
                            <i class="fa-solid fa-image text-7xl"></i>
                            <p class="text-center">Click To Upload Image</p>
                            <p class="text-center">Jpeg, Png, Jpg</p>
                            <span class="bg-gray-600 px-4 py-2 rounded-lg text-white hover:bg-gray-800 transition-all">
                                Browse file
                            </span>
                        </div>
                        <input type="file" id="file" class="hidden" name="poster" accept="image/*" />
                    </label>
                </div>

            </div>
            <div class="flex justify-end mt-6">
                <button type="submit" class="bg-gray-500 rounded-full px-5 py-5 text-white text-lg font-semibold"> Update
                    Movie</button>
            </div>
        </form>
    </div>

    <script>
        document.getElementById('file').addEventListener('change', function(event) {
            const file = event.target.files[0]; // Mendapatkan file yang diunggah
            if (file) {
                const reader = new FileReader(); // Membuat instance FileReader

                reader.onload = function(e) {
                    // Mengatur sumber (src) gambar preview menjadi data file
                    document.getElementById('imagePreview').src = e.target.result;
                };

                reader.readAsDataURL(file); // Membaca file sebagai Data URL
            } else {
                // Jika tidak ada file yang dipilih, kembali ke gambar default
                document.getElementById('imagePreview').src = "{{ asset('storage/' . $movie->poster) }}";
            }
        });
    </script>
@endsection
