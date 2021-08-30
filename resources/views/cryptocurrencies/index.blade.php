@extends('layouts.app')


@section('content')
<<<<<<< HEAD
<<<<<<< HEAD
    <section class="container card my-5 p-3">
       <h2 class="text-center m-2">Liste des cryptomonnaies</h2>
        <table style="width:100%;" class="col-12 table table-hover">
            <thead class="table-info">
=======
=======
>>>>>>> a5b0eccdcf43b8767e3e05aa5f8a6b0656d62a38

    <section class="p-3">
        <p>Liste des cryptomonnaies</p>
        <table style="width:100%;">
            <thead>
<<<<<<< HEAD
>>>>>>> edaf646e6196aa64875637853e802f36d3c63fdc
=======
>>>>>>> a5b0eccdcf43b8767e3e05aa5f8a6b0656d62a38
                <th>Id</th>
                <th>Logo</th>
                <th>Nom</th>
                <th>Valeur courante</th>
<<<<<<< HEAD
                <th>Modifier</th>
                <th>Supprimer</th>
=======
>>>>>>> a5b0eccdcf43b8767e3e05aa5f8a6b0656d62a38
            </thead>
            <tbody>
            @foreach($cryptocurrencies as $cryptocurrency)
                <tr>
                    <td>{{$cryptocurrency->id}}</td>
                    <td>{{$cryptocurrency->image}}</td>
                    <td>{{$cryptocurrency->name}}</td>
                    <td>{{$cryptocurrency->price}}</td>
<<<<<<< HEAD
                    <td><a href="/cryptocurrencies/{{$cryptocurrency->id}}/edit" class="btn btn-warning mx-3"><i class="fas fa-edit"></i></a></td>
=======
                    <td><a href="/cryptocurrencies/{{$cryptocurrency->id}}/edit" class="btn btn-primary">Modifier</a></td>
>>>>>>> a5b0eccdcf43b8767e3e05aa5f8a6b0656d62a38
                    <td> 
                        <form action="/cryptocurrencies/{{$cryptocurrency->id}}" method="post">
                            {{csrf_field()}}
                            <input type="hidden" name="_method" value="delete" />
<<<<<<< HEAD
                            <button type="submit" class="admin-delete btn btn-danger mx-3" onclick='return confirm("Êtes-vous sûr de vouloir supprimer {{$cryptocurrency->name}} ?")'><i class="fas fa-trash-alt"></i></button>
=======
                            <button type="submit" class="admin-delete dropdown-item" onclick='return confirm("Êtes-vous sûr de vouloir supprimer {{$cryptocurrency->name}} ?")'><i class="fas fa-trash-alt"></i>Supprimer</button>
>>>>>>> a5b0eccdcf43b8767e3e05aa5f8a6b0656d62a38
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </section>
@endsection