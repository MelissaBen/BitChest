@extends('layouts.app')


@section('content')
    <section class="p-3">
        <p>Liste des cryptomonnaies</p>
        <table style="width:100%;">
            <thead>
                <th>Id</th>
                <th>Logo</th>
                <th>Nom</th>
                <th>Valeur courante</th>
            </thead>
            <tbody>
            @foreach($cryptocurrencies as $cryptocurrency)
                <tr>
                    <td>{{$cryptocurrency->id}}</td>
                    <td>{{$cryptocurrency->image}}</td>
                    <td>{{$cryptocurrency->name}}</td>
                    <td>{{$cryptocurrency->price}}</td>
                    <td><a href="/cryptocurrencies/{{$cryptocurrency->id}}/edit" class="btn btn-primary">Modifier</a></td>
                    <td> 
                        <form action="/cryptocurrencies/{{$cryptocurrency->id}}" method="post">
                            {{csrf_field()}}
                            <input type="hidden" name="_method" value="delete" />
                            <button type="submit" class="admin-delete dropdown-item" onclick='return confirm("Êtes-vous sûr de vouloir supprimer {{$cryptocurrency->name}} ?")'><i class="fas fa-trash-alt"></i>Supprimer</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </section>
@endsection