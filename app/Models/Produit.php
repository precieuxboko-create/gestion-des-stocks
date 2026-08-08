<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class Produit extends Model
{
    use hasFactory, HasUuids ;
    protected $fillable = [
        'name',
        'description',
        'price',
        'quantity',
    ];
    
}
