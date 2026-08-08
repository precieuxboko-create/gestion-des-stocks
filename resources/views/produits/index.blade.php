<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Listes des produits</h1>
    <a href="{{ route('produits.create') }}">Ajouter +</a>
    @if(session('success'))
        <div style='color:greenyellow'>{{session('success')}}</div>
    @endif    
    <table border="1">
        <tr>
            <th> Nom </th>
            <th> Description </th>
            <th> Prix </th>
            <th> Quantité </th>
            <th>Action</th>
        </tr>

        @forelse($produits as $produit)
            <tr>
                <td>{{ $produit->name}}</td>
                <td>{{ $produit->description }}</td>
                <td>{{ $produit->price }}</td>
                <td>{{ $produit->quantity }}</td>
                
            

            
                <td>
                    <a href="{{route('produits.show', $produit)}}">Voir</a>
                    <a href="{{route('produits.edit', $produit)}}">Modifier</a>

                    <form action="{{route('produits.destroy', $produit)}}" method="POST">
                        @csrf 
                        @method ('DELETE')

                        <button type="submit">Supprimer</button>
                    </form>
                    
                </td>
            </tr>

        @empty
        <tr> 
            <td colspan="4">Aucun produit trouvé</td>
        </tr>
        @endforelse

    </table>

    
</body>
</html>