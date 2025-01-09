<dialog id="my_modal_3" class="modal text-sky-950">
    <div class="modal-box bg-white">
        <form method="dialog">
            <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
        </form>
        <h3 class="text-xl font-bold text-center">  Masukan Genre Movie </h3>
        <form action="{{ route('genre.store') }}" method="post">
            @csrf
            @method('POST')
            <div class="mt-2">
                <input type="text" name="name" id="name" placeholder="Masukan Genre Movie ..."
                    class="input input-bordered w-full mt-3 bg-slate-50 rounded-full border-gray-400 border-2">
            </div>
            <div class="flex justify-end">
                <button
                    class="btn bg-primary border-0 text-sky-950 text-lg rounded-3xl mt-5 hover:bg-slate-500 hover:text-white"
                    type="submit"> Tambah </button>
            </div>
        </form>
    </div>
</dialog>