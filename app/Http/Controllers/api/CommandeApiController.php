<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Commande;
use Illuminate\Http\Request;
use App\Http\Requests\StoreCommandeRequest;
use App\Http\Requests\UpdateCommandeRequest;
use App\Http\Resources\CommandResource;

class CommandeApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $commandes = Commande::query()->latest()->paginate(10);
        return  CommandResource::collection($commandes);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCommandeRequest $request)
    {
        $data = $request->validated();
                $data['montant'] = $data['prixUnitaire'] * $data['quantity'];
                
                
        $commande = Commande::create($data);

        $data =[
            'message'=>'Nouvelle commande ajouter avec succès',
            'data'=>new CommandResource($commande),
            
        ];
        return response()->json($data); 

    }

    /**
     * Display the specified resource.
     */
    public function show(Commande $commande)
    {
        $data = [
            'message'=>'Commande affiché avec succès !',
            'data'=>new CommandResource($commande),
        ];
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCommandeRequest $request, Commande $commande)
    {
        $commande->update($request->validated());
        $data =[
            'message'=>'Commande modifier avec succèss',
            'data'=>new CommandResource($commande),
            
        ];
        return response()->json($data);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Commande $commande)
    {
        $commande->delete();
        $data =[
            'message'=>'Produit supprimer avec succèss',
            'data'=>new CommandResource($commande),
            
        ];
        return response()->json($data);
    }
}
