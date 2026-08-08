<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Modifer le produit</h>

    <form action="{{ route('produits.update', $produit)}}" method="POST">
        @csrf 
        @method('PUT')

        <div>
            <label for="Name">Nom</label>
            <input type="text" name="name"  id="name" value="{{old('name', $produit->name)}}">
            @error('name')
                <div style="color:red">
                    {{$message}}
            @enderror
                </div>

        </div><br>

        <div>
            <label for="description">Description</label>
            <textarea type="text" name="description"  id="description" value="">{{old('description', $produit->description)}}</textarea>
            @error('description')
                <div style="color:red">
                    {{$message}}
                </div>
            @enderror  
        </div><br>

        <div>
            <label for="price">Prix</label>
            <input type="number" name="price"  id="price" min= '0' value="{{old('price', $produit->price)}}">
            @error('price')
                <div style="color:red">
                    {{$message}}
                </div>
            @enderror

        </div><br>

        <div>
            <label for="quantity">Quantite</label>
            <input type="number" name="quantity"  id="quantity" value="{{old('quantity', $produit->quantity)}}">
            @error('quantity')
                <div style="color:red">
                    {{$message}}
                </div>
            @enderror

        </div><br>

        <button type="submit">Mettre à jour</button>
</body>
</html>