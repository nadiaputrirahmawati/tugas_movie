@extends('layout.admin')
@section('content')
    <h1 class="text-3xl font-bold text-black"> --- Update Genre </h1>
    <a href="" class="flex space-x-3 mt-5">
        <h1><i class="fa-solid fa-angle-right text-3xl"></i> </h1>
        <h1 class="text-lg mt-1 font-medium">Back To Genre</h1>
    </a>
    <div class="flex justify-center mt-10">
        <div class="rounded-3xl bg-slate-100 p-4  w-full lg:w-1/2 shadow-lg">
            <h3 class="text-xl font-bold text-center"> Genre Movie </h3>
            <form action="{{ route('genre.update', $genre->id) }}" method="post">
                @csrf
                @method('PUT')
                <div class="mt-2">
                    <input type="text" name="name" id="name" placeholder="Masukan Genre Movie ..."
                        class="input input-bordered w-full mt-3 bg-slate-50 rounded-full border-gray-400 border-2"
                        value="{{ old('title', $genre->name) }}">
                </div>
                <div class="flex justify-end">
                    <button
                        class="btn bg-primary border-0 text-sky-950 text-lg rounded-3xl mt-5 hover:bg-slate-500 hover:text-white"
                        type="submit"> Update </button>
                </div>
            </form>
        </div>
    </div>
@endsection
