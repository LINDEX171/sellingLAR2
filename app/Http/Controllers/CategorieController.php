<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use COM;
use Illuminate\Http\Request;

class CategorieController extends Controller
{
    

  public function liste(Request $request)
  {
      $search = $request->input('search');

      $categorie = Categorie::query()
          ->when($search, function ($query, $search) {
              return $query->where('nom', 'like', "%{$search}%");
          })
          ->paginate(5);

      return view("admin.categories.liste-categorie", compact('categorie'));
  }


    public function store(Request $request)
    {
        $categorie = new Categorie(); 
        $categorie->nom = $request->nom;
        $categorie->description = $request->description;
        
        $categorie->save();
 
      return redirect()->route('liste')->with('success', 'categorie ajouté avec succès');
}

public function updatecategorie($id)
{
    $categorie = Categorie::find($id);
    return view("admin.categories.update", compact('categorie'));
}


public function updatestorecategorie(Request $request)
{
    $categorie = Categorie::find($request->id);
    $categorie->nom = $request->nom;
    $categorie->description = $request->description;
    $categorie->update(); 
    return redirect('/liste-categorie')->with('success', 'Categorie modifié avec succès');
}

public function deletecategorie($id)
{
    $categorie = Categorie::find($id);
    $categorie->delete();
    return redirect('/liste-categorie')->with('success', 'Categorie supprimé avec succès');
}
}
