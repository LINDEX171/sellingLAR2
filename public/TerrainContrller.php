<?php

namespace App\Http\Controllers;

use App\Models\Terrain;
use Illuminate\Http\Request;

class TerrainContrller extends Controller
{
    public function index()
    { 
      return view("admin.terrains.terrain");
    }

    public function liste()
    {
        $terrain = Terrain::orderBy('longueur')->paginate(5);
      return view("admin.terrains.liste-terrain", compact('terrain'));
    }

    public function store(Request $request)
    {
        $terrain = new Terrain(); 
        $terrain->longueur = $request->longueur;
        $terrain->largeur = $request->largeur;
        $terrain->titre = $request->titre;
        
        $terrain->save();
 
      return redirect()->route('liste')->with('success', 'Terrain ajouté avec succès');
}

public function updateterrain($id)
{
    $terrain = Terrain::find($id);
    return view("admin.terrains.update", compact('terrain'));
}


public function updatestoreterrain(Request $request)
{
    $terrain = Terrain::find($request->id);
    $terrain->longueur = $request->longueur;
    $terrain->largeur = $request->largeur;
    $terrain->titre = $request->titre;
    $terrain->update(); 
    return redirect('/liste-terrain')->with('success', 'Terrain modifié avec succès');
}

public function deleteterrain($id)
{
    $terrain = Terrain::find($id);
    $terrain->delete();
    return redirect('/liste-terrain')->with('success', 'Terrain supprimé avec succès');
}

}
