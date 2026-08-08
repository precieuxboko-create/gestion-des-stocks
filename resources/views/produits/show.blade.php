<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Détails du produits</h1>

    <p>identifiant : {{$produit->id}}</p>
    <p>Nom : {{$produit->name}}</p>
    <p>Description : {{$produit->description}}</p>
    <p>Prix : {{$produit->price}}</p>
    <p>Quantite : {{$produit->quantity}}</p>

</body>
</html>