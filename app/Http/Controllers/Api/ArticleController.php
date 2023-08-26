<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Fournisseur;
use App\Models\ArticleFournisseur;



class ArticleController extends Controller
{

        public function index(Request $request)
    {

        $perPage = $request->input('per_page', 10); // Nombre d'articles par page (10 par défaut)
    
        $articles = Article::paginate($perPage);

        return response()->json($articles, 200);

    }



    public function LastInsertIdArt($id){
    $val=Article::where("categorie_id",$id)->get();
    return count($val)+1;
    }

    public function createArticle(Request $request)
    {
        // Validez les données du formulaire avant de les enregistrer
        $validatedData = $request->validate([
            'libelle' => 'required|string',
            'prix' => 'required|numeric',
            'stock' => 'required|integer',
            'reference' => 'required|string',
            'categorie_id' => 'required|integer',
            'photo' => 'string',
            'fournisseur' => 'required|array'
        ]);
    
        // Assurez-vous que $request->fournisseurs est un tableau de noms de fournisseurs existants
        $fournisseurIds = [];
        foreach ($validatedData['fournisseur'] as $fournisseurNom) {
            $fournisseur = Fournisseur::where('nom', $fournisseurNom)->first();
    
            if ($fournisseur) {
                $fournisseurIds[] = $fournisseur->id;
            } else {
                return response()->json(['message' => 'Fournisseur non trouvé: ' . $fournisseurNom], 404);
            }
        }
    
        // Créer l'article
        $article = Article::create([
            "libelle" => $validatedData['libelle'],
            "prix" => $validatedData['prix'],
            "stock" => $validatedData['stock'],
            "reference" => $validatedData['reference'],
            "categorie_id" => $validatedData['categorie_id'],
            "photo" => $validatedData['photo']        ]);
    
        // Associer les fournisseurs à l'article
        $article->fournisseurs()->attach($fournisseurIds);
    
        return response()->json(['message' => 'Article créé avec succès'], 201);
    }
    
       
    
     public function updateArticle(Request $request, $id)
        {
        // Trouver l'article à mettre à jour
        $article = Article::find($id);
    
        if (!$article) {
            return response()->json(['message' => 'Article non trouvé'], 404);
        }
    
        // Mettre à jour les champs nécessaires
        if ($request->has('libelle')) {
            $article->libelle = $request->input('libelle');
        }
    
        if ($request->has('prix')) {
            $article->prix = $request->input('prix');
        }
    
        if ($request->has('stock')) {
            $article->stock = $request->input('stock');
        }
    
        if ($request->has('reference')) {
            $article->reference = $request->input('reference');
        }
    
        if ($request->has('categorie_id')) {
            $article->categorie_id = $request->input('categorie_id');
        }
    
        if ($request->has('fournisseur')) {
            $article->fournisseur = $request->input('fournisseur');
        }
    
        // Sauvegarder les modifications
        $article->save();
    
        return response()->json(['message' => 'Article mis à jour avec succès'], 200);
    }
    
    public function destroy(Request $request, $id)
    {
        $article = Article::findOrFail($id);
        $article->delete();

        return response()->json(['message' => 'article deleted successfully']);
    }
        

 
    
}
