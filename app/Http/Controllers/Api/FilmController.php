<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Film;
use Illuminate\Http\Request;

class FilmController extends Controller
{
    function index()
    {
        // return 'Film';
        $totalFilms = Film::all();

        return response()->json([
            'films' => $totalFilms,
            'status' => 200
        ]);
    }
}
