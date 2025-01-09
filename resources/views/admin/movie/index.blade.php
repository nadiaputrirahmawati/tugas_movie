@extends('layout.admin')



@section('content')
    <h1 class="text-3xl font-bold text-black">Movies All</h1>
    <div class="mt-10 gap-3 flex">
        <a href="movie/create" class="bg-gray-200 shadow-lg px-5 py-3 rounded-full text-sky-950 text-xl font-semibold">Tambah Movie</a>
        <a href="#" class="bg-secondary text-white px-5 py-3 rounded-full text-xl font-semibold shadow-lg"
            onclick="my_modal_3.showModal()">Tambah Genre</a>
    </div>
    @include('admin.genre.create')

    <div class="card bg-white mt-5 p-0 rounded-3xl shadow-lg">
        <div class="overflow-x-auto text-black">
            <table class="table borderless">
                <thead class="text-black text-xl">
                    <tr>
                        <th>No</th>
                        <th>Poster</th>
                        <th>Title</th>
                        <th>Synopsis</th>
                        <th>Year</th>
                        <th>Genre</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody class="text-lg">
                    @forelse ($movie as $row)
                        <tr>
                            <th>{{ $loop->iteration + ($movie->currentPage() - 1) * $movie->perPage() }}</th>
                            <td><img src="{{ asset('storage/' . $row->poster) }}" alt="" class="h-1/2 w-48 object-cover"></td>
                            <td>{{ \Illuminate\Support\Str::limit($row->title, 25, '...') }}</td>
                            <td>{{ \Illuminate\Support\Str::limit($row->synopsis, 50, '...') }}</td>
                            <td>{{ $row->year }}</td>
                            <td>{{ $row->genre->name ?? 'Tidak Ada Genre' }}</td>
                            <td>
                                <div class="flex justify-center gap-3">
                                    <a href="{{ route('movie.show', $row->id)}}" class="bg-orange-400 text-white px-4 py-2 rounded-xl">
                                        <i class="fa-solid fa-circle-info text-xl"></i>
                                       
                                    </a>
                                    <a href="{{ route('movie.edit', $row->id) }}"
                                        class="bg-sky-400 text-white px-4 py-2 rounded-xl">
                                        <i class="fa-solid fa-pen-to-square text-xl"></i>
                                    </a>
                                    <form action="{{ route('movie.destroy', $row->id) }}" method="POST"
                                        class="delete-form">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class=" bg-red-400 text-white px-4 py-2 rounded-xl delete-btn">
                                            <i class="fa-solid fa-trash text-xl"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center text-gray-500">Tidak Ada Data Movie</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    <div class="mt-4  justify-center">
        {{ $movie->links('pagination::tailwind') }}
    </div>    
@endsection
