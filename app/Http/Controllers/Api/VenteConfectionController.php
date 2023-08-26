<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\VenteConfection;
use Illuminate\Http\Request;

class VenteConfectionController extends Controller
{
    public function index()
    {
        $venteConfections = VenteConfection::all();
        return response()->json($venteConfections);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'articleVente_id' => 'required|exists:article_ventes,id',
            'article_id' => 'required|exists:articles,id',
            'qte' => 'required|integer',
        ]);

        $venteConfection = VenteConfection::create($validatedData);

        return response()->json($venteConfection, 201);
    }

    public function show($id)
    {
        $venteConfection = VenteConfection::find($id);

        if ($venteConfection) {
            return response()->json($venteConfection);
        } else {
            return response()->json(['message' => 'Association de vente et de confection non trouvée'], 404);
        }
    }

    public function update(Request $request, $id)
    {
        $venteConfection = VenteConfection::find($id);

        if ($venteConfection) {
            $validatedData = $request->validate([
                'articleVente_id' => 'required|exists:article_ventes,id',
                'article_id' => 'required|exists:articles,id',
                'qte' => 'required|integer',
            ]);

            $venteConfection->update($validatedData);

            return response()->json($venteConfection, 200);
        } else {
            return response()->json(['message' => 'Association de vente et de confection non trouvée'], 404);
        }
    }

    public function destroy($id)
    {
        $venteConfection = VenteConfection::find($id);

        if ($venteConfection) {
            $venteConfection->delete();
            return response()->json(['message' => 'Association de vente et de confection supprimée'], 200);
        } else {
            return response()->json(['message' => 'Association de vente et de confection non trouvée'], 404);
        }
    }
}
