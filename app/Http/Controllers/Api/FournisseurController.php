<?php

namespace App\Http\Controllers\Api;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Fournisseur;

class FournisseurController extends Controller
{
    public function index()
    {
        $fournisseurs = Fournisseur::all();
        return view('fournisseurs.index', compact('fournisseurs'));
    }

    public function create()
    {
        return view('fournisseurs.create');
    }

    public function store(Request $request)
    {
        // Logique pour enregistrer un nouveau fournisseur dans la base de donné
    }



    public function search(Request $request, $id)
    {
        // Recherche un fournisseur en fonction de l'ID fourni
        $fournisseur = Fournisseur::find($id);

        if ($fournisseur) {
            return response()->json($fournisseur);
        } else {
            return response()->json(['message' => 'Fournisseur non trouvé'], 404);
        }
    }




}
