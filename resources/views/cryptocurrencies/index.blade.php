@extends('layouts.app')


@section('content')
    <section class="container card my-5 p-3">
       <h2 class="text-center m-2">Liste des cryptomonnaies</h2>
        <table style="width:100%;" class="col-12 table table-hover">
            <thead class="table-info">
                <th>Id</th>
                <th>Logo</th>
                <th>Nom</th>
                <th>Valeur courante</th>
                <th>Modifier</th>
                <th>Supprimer</th>
            </thead>
            <tbody>
            @foreach($cryptocurrencies as $cryptocurrency)
                <tr>
                    <td>{{$cryptocurrency->id}}</td>
                    <td>{{$cryptocurrency->image}}</td>
                    <td>{{$cryptocurrency->name}}</td>
                    <td>{{$cryptocurrency->price}}</td>
                    <td><a href="/cryptocurrencies/{{$cryptocurrency->id}}/edit" class="btn btn-warning mx-3"><i class="fas fa-edit"></i></a></td>
                    <td> 
                        <form action="/cryptocurrencies/{{$cryptocurrency->id}}" method="post">
                            {{csrf_field()}}
                            <input type="hidden" name="_method" value="delete" />
                            <button type="submit" class="admin-delete btn btn-danger mx-3" onclick='return confirm("Êtes-vous sûr de vouloir supprimer {{$cryptocurrency->name}} ?")'><i class="fas fa-trash-alt"></i></button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </section>
@endsection