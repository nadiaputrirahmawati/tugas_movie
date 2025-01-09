<?php

namespace App\Http\Controllers;

use App\Models\Cast;
use App\Models\Genre;
use App\Models\Movie;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index() {
        $moviestatic = Movie::count();
        $cast = Cast::count();
        $genre= Genre::count();
        $movie = Movie::with('genre')->orderBy('created_at', 'desc')->limit(4)->get();
        return view('admin.dashboard', compact('moviestatic','movie', 'genre', 'cast'));
    }


    public function data() {
        $cast = Movie::with('cast')->first();
        
    }
}
