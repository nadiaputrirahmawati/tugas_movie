<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use Illuminate\Http\Request;

class GenreController extends Controller
{
    // Menampilkan daftar semua genre
    public function index()
    {
        $genre = Genre::all();
        return view('admin.genre.genre', compact('genre'));
    }

    // Menampilkan form untuk membuat genre baru
    public function create()
    {
        return view('admin.genre.create');
    }

    // Menyimpan genre baru
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        Genre::create($request->all());
        toastr()->success('Genre Sudah Berhasil Di Tambahkan');
        return redirect()->route('genre.index');
    }

    // Menampilkan detail genre
    public function show(Genre $genre)
    {
        // 
    }

    // Menampilkan form untuk mengedit genre
    public function edit(Genre $genre)
    {
        return view('admin.genre.update', compact('genre'));
    }

    // Menyimpan perubahan genre
    public function update(Request $request, Genre $genre)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $genre->update($request->all());
        toastr()->success('Genre Sudah Berhasil Di Update');
        return redirect()->route('genre.index');
    }

    // Menghapus genre
    public function destroy(Genre $genre)
    {
        $genre->delete();
        toastr()->success('Genre Sudah Berhasil Di Delete');
        return redirect()->route('genre.index');
    }
}