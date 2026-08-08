<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Categorie;
use Illuminate\Http\Request;
use App\Http\Requests\StoreCategorieRequest;
use App\Http\Requests\UpdateCategorieRequest;
use App\Http\Resources\CategorieResource;


class CategorieApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categorie = Categorie::query()->latest()->paginate(10);
        return  CategorieResource::collection($categorie);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       $categorie= Categorie::create($request->validated());

        $data =[
            'message'=>'Produit ajouter avec succèss',
            'data'=>new CategorieResource($categorie),
            
        ];
        return response()->json($data); 
    }

    /**
     * Display the specified resource.
     */
    public function show(Categorie $categorie)
    {
        $data =[
            'message'=>'Categorie afficher avec succès',
            'data'=>new CategorieResource($categorie),
        ];
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Categorie $categorie)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Categorie $categorie)
    {
        //
    }
}
