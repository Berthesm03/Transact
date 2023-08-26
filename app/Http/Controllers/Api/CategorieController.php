<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller\Api;
use Illuminate\Http\Request;
use App\Models\Categorie;
use App\Http\Controllers\Controller;


class CategorieController extends Controller
{
    public function index()
    {
        // return Categorie::all();
        return Categorie::paginate(3);

    }

    public function store(Request $request)
    {
        return Categorie::create($request->all());
    }

    public function show($libelle)
    {
        if (strlen($libelle) < 3) {
            return response()->json(['message' => 'Le libellé doit avoir au moins 3 caractères'], 400);
        }

        $categorie = Categorie::where('libelle', $libelle)->first();

        if (!$categorie) { 
            return response()->json(['message' => 'Catégorie non trouvée'], 404);
        }

        return response()->json(['data' => $categorie]);
    }

    public function update(Request $request, Categorie $category)
    {
        $idCategory=Categorie::find($category->id);
        $idCategory->update([
            "libelle"=>$request->libelle
        ]);
        return $idCategory;
    }

   
    public function destroy(Request $request, $id)
    {
        $categorie = Categorie::findOrFail($id);
        $categorie->delete();

        return response()->json(['message' => 'Category deleted successfully']);
    }
}

