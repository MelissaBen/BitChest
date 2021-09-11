@extends('layouts.app')

@section('content')
    <section class="d-flex justify-content-between align-items-center bg-white p-4">
        <h2>Liste des rôles</h2>
        <a class="d-flex flex-column align-items-center justify-content-center text-center" href="/roles/create"> <i class="fas fa-plus-circle fa-lg"></i> <span>Ajouter un rôle</span> </a>
    </section>

    <section class="container-fluid p-0">
        @if(Session::has('success')) 
            <div class="alert alert-success">
                {{Session::get('success')}}
            </div>
            {{Session::put('success', null)}}
        @endif
    </section>

        <section class="p-3 card  mr-3 ml-4 my-3 text-center">
      
            <table class="w-100 col-12 table table-hover table-responsive">
                <thead class="table-info">
                    <th>Id</th>
                    <th>Nom</th>
                    <th></th>
                    <th></th>
                    <th>Modifier</th>
                    <th>Supprimer</th>
                </thead>
                <tbody>
                    @foreach($roles as $role)
                        <tr>
                            <td>{{$role->id}}</td>
                            <td>{{$role->name}}</td>
                            <td></td>
                            <td></td>
                            <td><a href="/roles/{{$role->id}}/edit" class="btn btn-warning mx-3"><i class="fas fa-edit"></i></a></td>
                            <td> 
                                <form action="/roles/{{$role->id}}" method="post">
                                    {{csrf_field()}}
                                    <input type="hidden" name="_method" value="delete" />
                                    <button type="submit" class="admin-delete  btn btn-danger mx-3" 
                                    onclick='return confirm("Êtes-vous sûr de vouloir supprimer ce rôle ?")'><i class="fas fa-trash-alt"></i></button>

                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
           
           
        
        </section>
@endsection
