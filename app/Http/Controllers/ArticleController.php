<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Article;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        $article= Article::all();
        return response()->json($article,200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = auth()->user();
        
        // Validez les données soumises par le formulaire
        $request->validate([
            'titre' => 'required|string|max:255',
            'contenu' => 'required|string',
            'status' => 'required|in:public,private', // Définissez les valeurs autorisées ici
            'user_id' => 'required|numeric',
        ]);
    
        // Créez un nouvel article dans la base de données
        $article = Article::create([
            'titre' => $request->input('titre'),
            'contenu' => $request->input('contenu'),
            'status' => $request->input('status'),
            'user_id' => $request->input('user_id'),
        ]);
    
        // Retournez une réponse JSON pour indiquer que l'article a été créé
        return response()->json($article, 201); // 201 Created
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
        $article = article::find($id);
        $article->delete();
        return response()->json($produit,203);
    }
}
