<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCategorieRequest;
use App\Models\categorie;
use Illuminate\Http\Request;

class categorieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = categorie::all();
        return view('categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategorieRequest $request)
    {
        $categorie= categorie::create($request->validated());
       return redirect()->route('categorie.index')->with('success', 'Produits ajouter avec succèss');
    
    }

    /**
     * Display the specified resource.
     */
    public function show(categorie $categorie)
    {
        return view('categories.show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(categorie $categorie)
    {
        return view('produits.edit', compact('produit'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, categorie $categorie)
    {
        $categorie= Categorie::create($request->validated());
        return redirect()->route('categorie.index')->with('success', 'Produit modifié avec success !');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(categorie $categorie)
    {
      $categorie->delete();
        return redirect()->route('categorie.index')->with('success', 'Suppression réussir !');
    
    }
}
