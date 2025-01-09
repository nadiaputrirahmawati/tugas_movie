<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use App\Models\Movie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use function Flasher\Toastr\Prime\toastr;

class MovieController extends Controller
{
    public function index()
    {
        $movie = Movie::with('genre')->orderBy('created_at', 'desc')->paginate(5);
        return view('admin.movie.index', compact('movie'));
    }

    public function create()
    {
        $genre = Genre::all();
        return view('admin.movie.create', compact('genre'));
    }

    public function store(Request $request)
    {
        // Validasi input data
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'synopsis' => 'required|string',
            'poster' => 'required|image|mimes:jpg,png,jpeg|max:2048',
            'year' => 'required|string',
            'trailer' => 'required|string',
            'duration' => 'required|string',
            'available' => 'nullable|string|in:on,off',
            'genre_id' => 'required|exists:genres,id',
        ]);
        $validated['available'] = $request->input('available') === 'on' ? 1 : 0;

        // Menyimpan file poster
        if ($request->hasFile('poster')) {
            $posterPath = $request->file('poster')->store('posters', 'public');
        }

        // Membuat movie baru
        Movie::create([
            'title' => $validated['title'],
            'synopsis' => $validated['synopsis'],
            'poster' => $posterPath ?? null,
            'year' => $validated['year'],
            'trailer' => $validated['trailer'],
            'duration' => $validated['duration'],
            'available' => $validated['available'],
            'genre_id' => $validated['genre_id'],
        ]);
        toastr()->success('Movie Sudah Berhasil Di Tambahkan');

        return redirect()->route('movie.index');
    }

    public function show($id)
    {
        // $movie = Movie::findOrFail($id);
        $movie = Movie::with('cast')->findOrFail($id);
        // dd($movie);
        return view('admin.movie.detail', compact('movie'));
    }

    public function edit($id)
    {
        $movie = Movie::findOrFail($id);
        $genre = Genre::all();
        return view('admin.movie.update', compact('movie', 'genre'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'synopsis' => 'required|string',
            'poster' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
            'year' => 'required|string',
            'trailer' => 'required|string',
            'duration' => 'required|string',
            'available' => 'nullable|string|in:on,off',
            'genre_id' => 'required|exists:genres,id',
        ]);
        // dd($validated);
        $validated['available'] = $request->input('available') === 'on' ? 1 : 0;
        $movie = Movie::findOrFail($id);

        if ($request->hasFile('poster')) {
            if ($movie->poster && Storage::exists('public/' . $movie->poster)) {
                Storage::delete('public/' . $movie->poster);
            }
            $posterPath = $request->file('poster')->store('posters', 'public');
            $movie->poster = $posterPath;
        }

        $movie->update([
            'title' => $validated['title'],
            'synopsis' => $validated['synopsis'],
            'year' => $validated['year'],
            'trailer' => $validated['trailer'],
            'duration' => $validated['duration'],
            'available' => $validated['available'],
            'genre_id' => $validated['genre_id'],
        ]);
        toastr()->success('Movie Sudah Berhasil Di Update');
        return redirect()->route('movie.index');
    }

    public function destroy($id)
    {
        $movie = Movie::findOrFail($id);

        // Hapus poster jika ada
        if ($movie->poster && Storage::exists('public/' . $movie->poster)) {
            Storage::delete('public/' . $movie->poster);
        }

        // Hapus data movie
        $movie->delete();
        toastr()->success('Movie Sudah Berhasil Di Delete');
        return redirect()->route('movie.index');
    }

    public function data()
    {

        $movie = Movie::with('genre')
            ->orderBy('created_at', 'desc')
            ->limit(4)
            ->get();

        $movieIds = $movie->pluck('id')->toArray();
        $otherMovies = Movie::with('genre')
            ->whereNotIn('id', $movieIds)
            ->orderBy('id', 'desc')
            ->limit(5)
            ->get();

        $romanceMovies = Movie::with('genre')
            ->whereHas('genre', function ($query) {
                $query->where('name', 'romance');
            })
            ->orderBy('created_at', 'desc')
            ->get();
        return view('pages.index', compact('movie', 'otherMovies', 'romanceMovies'));
    }


    public function detailMovie($id)
    {
        $movie = Movie::with('genre')->findOrFail($id);

        return view('pages.detailMovie', compact('movie'));
    }

    public function movieall()
    {
        $search = request()->query('search');

        if ($search) {
            $movie = Movie::with('genre')->with('cast')->where('title', 'like', "%{$search}%")->paginate(10);
        } else {
            $movie = Movie::with('genre')->with('cast')->paginate(10);
        }
        return view('pages.movie', compact('movie'));
    }

    public function movienews()
    {
        $movie = Movie::with('genre')->with('cast')->orderBy('created_at', 'desc')->get();

        return view('pages.movieTerbaru', compact('movie'));
    }
}
