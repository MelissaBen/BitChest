@extends('layouts.app')

@section('content')
        <section class="p-3">
            Liste des utilisateurs
            <a class="admin-add" href="/users/create">
            <i class="fas fa-plus-circle"></i>
            <p>Ajouter un utilisateur</p>
        </a>
<<<<<<< HEAD
            <table style="width:100%;" class="col-12 table table-hover m-2">
                <thead class="table-info">
=======
            <table style="width:100%;">
                <thead>
>>>>>>> a5b0eccdcf43b8767e3e05aa5f8a6b0656d62a38
                    <th>Id</th>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>email</th>
                    <th>Role</th>
                    <th></th>
                    <th></th>
                </thead>
                <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td>{{$user->id}}</td>
                            <td>{{$user->firstname}}</td>
                            <td>{{$user->lastname}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->name}}</td>
<<<<<<< HEAD
                            <td><a href="/users/{{$user->id}}/edit" class="btn btn-warning mx-3"><i class="fas fa-edit"></i> Modifier</a></td>
=======
                            <td><a href="/users/{{$user->id}}/edit" class="btn btn-primary">Modifier</a></td>
>>>>>>> a5b0eccdcf43b8767e3e05aa5f8a6b0656d62a38
                            <td> 
                                <form action="/users/{{$user->id}}" method="post">
                                    {{csrf_field()}}
                                    <input type="hidden" name="_method" value="delete" />
<<<<<<< HEAD

                                    <button type="submit" class="admin-delete  btn btn-danger mx-3" onclick='return confirm("Êtes-vous sûr de vouloir supprimer ce produit ?")'><i class="fas fa-trash-alt"></i> Supprimer</button>

=======
                                    <button type="submit" class="admin-delete dropdown-item" onclick='return confirm("Êtes-vous sûr de vouloir supprimer ce produit ?")'><i class="fas fa-trash-alt"></i>Supprimer</button>
>>>>>>> a5b0eccdcf43b8767e3e05aa5f8a6b0656d62a38
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </section>
@endsection
