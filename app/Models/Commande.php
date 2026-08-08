<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class Commande extends Model
{
    use hasFactory, HasUuids ;
    protected $fillable = [
        'num_commande',
        //'categorie',
        'produit',
        'prixUnitaire',
        'quantity',
        'montant'
    ];
}
