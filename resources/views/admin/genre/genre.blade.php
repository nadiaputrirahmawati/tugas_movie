@extends('layout.admin')
@section('content')
    <h1 class="text-3xl font-bold text-black"> Genre </h1>
    <div class="mt-10">
        <a href="#" class="bg-secondary text-white px-5 py-3 shadow-lg rounded-full text-xl font-semibold"
            onclick="my_modal_3.showModal()">Tambah Genre</a>
    </div>
    @include('admin.genre.create')
    <div class="grid  grid-cols-1 lg:grid-cols-5 mt-7 gap-4">
        @forelse ($genre as $item)
            <div class="rounded-3xl bg-white p-5 shadow-lg">
                <h1 class="text-xl font-semibold">{{ $item->name }}</h1>
                <div class="flex justify-end space-x-3 mt-4">
                    <div>
                        <form action="{{ route('genre.destroy', $item->id) }}" method="POST" class="pt-1">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-400 px-3 py-2 rounded-xl text-white "><i
                                    class="fa-solid fa-trash text-lg"></i></button>
                        </form>
                    </div>
                    <div class="mt-3">
                        <a href="{{ route('genre.edit', $item->id) }}"
                            class="bg-primaryy px-3 py-3 rounded-xl text-white"><i
                                class="fa-solid fa-pen-to-square text-lg"></i></a>
                    </div>

                </div>
            </div>
        @empty
            {{-- <div class="justify-center"> --}}
            <h1 class="text-center"> Tidak Ada Genre Yang Tersedia</h1>
            {{-- </div> --}}
        @endforelse

    </div>
@endsection
