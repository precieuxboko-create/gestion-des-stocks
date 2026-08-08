<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProduitResource;
use App\Models\Produit;
use Illuminate\Http\Request;
use App\Http\Requests\StoreProduitRequest;
use App\Http\Requests\UpdateProduitRequest;
   

class ProduitApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $produits = Produit::query()->latest()->paginate(10);
        return  ProduitResource::collection($produits);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProduitRequest $request)
    {
        $produit= Produit::create($request->validated());

        $data =[
            'message'=>'Produit ajouter avec succèss',
            'data'=>new ProduitResource($produit),
            
        ];
        return response()->json($data);        
      
    }

    /**
     * Display the specified resource.
     */
    public function show(Produit $produit)
    {
        $data =[
            'message'=>'Produit afficher avec succèss',
            'data'=>new ProduitResource($produit),
            
        ];
        
        return response()->json($data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProduitRequest $request, Produit $produit)
    {
        $produit->update($request->validated());
        $data =[
            'message'=>'Produit modifier avec succèss',
            'data'=>new ProduitResource($produit),
            
        ];
        return response()->json($data);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Produit $produit)
    {
        $produit->delete();
        $data =[
            'message'=>'Produit supprimer avec succèss',
            'data'=>new ProduitResource($produit),
            
        ];
        return response()->json($data);
    }
}
