@extends('layouts.app')

@section('content')
    <section class="d-flex justify-content-between align-items-center p-4 bg-white">
        <h2>Liste des utilisateurs</h2>
        <a class="d-flex flex-column align-items-center justify-content-center text-center" href="/users/create"> 
            <i class="fas fa-plus-circle fa-lg"></i> 
            <span>Ajouter un utilisateur</span> 
        </a>
    </section>

    
    <section class="container-fluid p-0">
        @if(Session::has('success')) 
            <div class="alert alert-success">
                {{Session::get('success')}}
            </div>
            {{Session::put('success', null)}}
        @endif
    </section>
    
        <section class="p-3 card mr-3 ml-4 my-3 text-center">
      
            <table class="col-12 table table-hover table-responsive w-100">
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
                            <td>{{$user->lastname}}</td>
                            <td>{{$user->firstname}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->name}}</td>
                            <td><a href="/users/{{$user->id}}/edit" class="btn btn-warning mx-3"><i class="fas fa-edit"></i></a></td>
                            <td> 
                                <form action="/users/{{$user->id}}" method="post">
                                    {{csrf_field()}}
                                    <input type="hidden" name="_method" value="delete" />
                                    <button type="submit" class="admin-delete  btn btn-danger mx-3" 
                                    onclick='return confirm("Êtes-vous sûr de vouloir supprimer cet utilisateur : {{$user->lastname}} {{$user->firstname}} ?")'>
                                        <i class="fas fa-trash-alt"></i>
                                    </button>

                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </section>
@endsection
