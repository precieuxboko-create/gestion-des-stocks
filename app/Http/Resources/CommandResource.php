<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CommandResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'=>$this->id,
            'num_commande'=>$this->num_commande,
            'produit'=>$this->produit,
            //'categorie'=>$this->categorie,
            'prixUnitaire'=>$this->prixUnitaire,
            'quantity'=>$this->quantity,
            'montant'=>$this->montant,
            'created_at'=>$this->created_at,
            'updated_at'=>$this->updated_at,
        ];
    }
}
