@extends('layouts.app')

@section('content')
        <section class="p-3">
            Liste des utilisateurs
            <a class="admin-add" href="/users/create">
            <i class="fas fa-plus-circle"></i>
            <p>Ajouter un utilisateur</p>
        </a>
            <table style="width:100%;">
                <thead>
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
                            <td><a href="/users/{{$user->id}}/edit" class="btn btn-primary">Modifier</a></td>
                            <td> 
                                <form action="/users/{{$user->id}}" method="post">
                                    {{csrf_field()}}
                                    <input type="hidden" name="_method" value="delete" />
                                    <button type="submit" class="admin-delete dropdown-item" onclick='return confirm("Êtes-vous sûr de vouloir supprimer ce produit ?")'><i class="fas fa-trash-alt"></i>Supprimer</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </section>
@endsection
