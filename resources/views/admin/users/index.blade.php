@extends('layouts.app')

@section('content')
    <section style="margin-bottom:20px;display:flex;justify-content:space-between;align-items:center;background:#FFF;padding: 20px;">
        <h2>Utilisateurs</h2>
        <a class="admin-add  d-flex flex-column align-items-center justify-content-center text-center" href="/users/create"> <i class="fas fa-plus-circle fa-lg"></i> <span>Ajouter un utilisateur</span> </a>
    </section>

        <section class="p-3 card  mr-3 ml-4 my-3 text-center">
            <h2 class="m-3">Liste des utilisateurs</h2>
      
            <table style="width:100%;" class="col-12 table table-hover table-responsive">
                <thead class="table-info">
                    <th>Id</th>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>email</th>
                    <th>Role</th>
                    <th>Modifier</th>
                    <th>Supprimer</th>
                </thead>
                <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td>{{$user->id}}</td>
                            <td>{{$user->firstname}}</td>
                            <td>{{$user->lastname}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->name}}</td>
                            <td><a href="/users/{{$user->id}}/edit" class="btn btn-warning mx-3"><i class="fas fa-edit"></i></a></td>
                            <td> 
                                <form action="/users/{{$user->id}}" method="post">
                                    {{csrf_field()}}
                                    <input type="hidden" name="_method" value="delete" />
                                    <button type="submit" class="admin-delete  btn btn-danger mx-3" onclick='return confirm("Êtes-vous sûr de vouloir supprimer ce produit ?")'><i class="fas fa-trash-alt"></i></button>

                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
           
           
        
        </section>
@endsection
