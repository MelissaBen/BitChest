@extends('layouts.app')


@section('content')
    <section class="d-flex justify-content-between align-items-center p-4 bg-white">
        <h2>Liste des cryptomonnaies</h2>
            <a class="admin-add  d-flex flex-column align-items-center justify-content-center text-center" href="/cryptocurrencies/create"> <i class="fas fa-plus-circle fa-lg"></i> <span>Ajouter une cryptomonnaie</span> </a>
    </section>
    
    <section class="container-fluid p-0">
        @if(Session::has('success')) 
            <div class="alert alert-success">
                {{Session::get('success')}}
            </div>
            {{Session::put('success', null)}}
        @endif
    </section>

    <section class="mr-3 ml-4 card my-3 p-3 margin-bottom">
        <table class="col-12 table table-hover table-responsive w-100">
            <thead class="table-info">
                <th>Id</th>
                <th>Logo</th>
                <th>Nom</th>
                <th></th>
                <th></th>
                <th>    </th>
            </thead>
            <tbody>
            @foreach($cryptocurrencies as $cryptocurrency)
                <tr>
                    <td>{{$cryptocurrency->id}}</td>
                    @if(file_exists(public_path('images/' . $cryptocurrency->image)))
                        <td><img width="32" height="32" src="/images/{{$cryptocurrency->image}}" alt="crypto_logo"></td>
                    @else
                        <td><img width="32" height="32" src="{{asset('storage/images/'.$cryptocurrency->image) }}" alt="crypto_logo"></td>
                    @endif
                    <td>{{$cryptocurrency->name}}</td>
                    <td>{{$cryptocurrency->price}}</td>
                    <td><a href="/cryptocurrencies/{{$cryptocurrency->id}}/edit" class="btn btn-warning mx-3"><i class="fas fa-edit"></i></a></td>

                    <td> 
                        <form action="/cryptocurrencies/{{$cryptocurrency->id}}" method="post">
                            {{csrf_field()}}
                            <input type="hidden" name="_method" value="delete" />
                            <button type="submit" class="admin-delete  btn btn-danger mx-3" onclick='return confirm("Êtes-vous sûr de vouloir supprimer {{$cryptocurrency->name}} ?")'><i class="fas fa-trash-alt"></i></button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </section>
@endsection 