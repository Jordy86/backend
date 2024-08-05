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
            'status' => 200,
            'msg' => 'Tous les films ont été recupérés'
        ]);
    }

    public function store(Request $request, Film $film)
    {
        $url = $request->url;
        $titre = $request->titre;
        $description = $request->description;

        if (!empty($url) && !empty($titre)) {
            $film->url = $url;
            $film->titre = $titre;
            $film->description = $description;

            $film->save();

            return response()->json(
                [
                    'film' => $film,
                    'status' => 200,
                    'msg' => 'Insérer avec succès'
                ]
            );
        } else {
            return response()->json(
                [
                    'msg' => 'Veuillez remplir tous les champs',
                    'status' => 400
                ]
            );
        }
    }
}
