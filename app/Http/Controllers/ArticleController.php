<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Categorie;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
   
    public function liste(Request $request)
    {
        $categories = Categorie::all();
        $search = $request->input('search');
  
        $article = Article::query()
            ->when($search, function ($query, $search) {
                return $query->where('nom', 'like', "%{$search}%");
            })
            ->paginate(5);
  
        return view("admin.articles.liste-article", compact('article','categories'));
    }
    

    public function store(Request $request)
    {
        $article = new Article(); 
        $article->nom = $request->nom;
        $article->description = $request->description;
        $article->categorie_id = $request->categorie_id;
        
        $article->save();
 
      return redirect()->route('liste1')->with('success', 'article ajouté avec succès');
}

public function updatearticle($id)
{
   
    $categories = Categorie::all();
    $article = Article::find($id);
    return view("admin.articles.update", compact('article', 'categories'));
}


public function updatestorearticle(Request $request)
{
    $article = Article::find($request->id); 
    $article->nom = $request->nom;
    $article->description = $request->description;
    $article->categorie_id = $request->categorie_id;
        
    $article->update();
    return redirect('/liste-article')->with('success', 'Article modifié avec succès');
}

public function deletearticle($id)
{
    $article = Article::find($id);
    $article->delete();
    return redirect('/liste-article')->with('success', 'article supprimé avec succès');
}
}
