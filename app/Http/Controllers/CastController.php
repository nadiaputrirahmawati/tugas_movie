<?php

namespace App\Http\Controllers;

use App\Models\Cast;
use App\Models\CastMovie;
use Illuminate\Http\Request;

class CastController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        

        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request);
        // Validasi input data
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'age' => 'required|integer|min:1|max:120',
            'biodata' => 'nullable|string',
            'avatar' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
        ]);

        // Menyimpan file avatar jika ada
        if ($request->hasFile('avatar')) {
            $avatarPath = $request->file('avatar')->store('avatars', 'public');
        }

        // Membuat pengguna baru
        $cast = Cast::create([
            'name' => $validated['name'],
            'age' => $validated['age'],
            'biodata' => $validated['biodata'],
            'avatar' => $avatarPath ?? null,
        ]);

        CastMovie::create([
            'cast_id' => $cast->id,
            'movie_id' => $request->input('movie_id'),
        ]);
        toastr()->success('Cast Sudah Berhasil Di Tambahkan');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
