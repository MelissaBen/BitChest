@extends('layouts.app')


@section('content')
    <section style="margin-bottom:20px;display:flex;justify-content:space-between;align-items:center;background:#FFF;padding: 20px;">
        <h2>Cryptomonnaies</h2>
            <a class="admin-add  d-flex flex-column align-items-center justify-content-center text-center" href="/cryptocurrencies/create"> <i class="fas fa-plus-circle fa-lg"></i> <span>Ajouter une cryptomonnaie</span> </a>
    </section>

    <section class="mr-3 ml-4 card my-3 p-3">
        <table style="width:100%;" class="col-12 table table-hover table-responsive">
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
                   <!-- <td><a href="/cryptocurrencies/{{$cryptocurrency->id}}/edit" class="btn btn-primary">Modifier</a></td>-->
                    <td><a href="/cryptocurrencies/{{$cryptocurrency->id}}/edit" class="btn btn-warning mx-3"><i class="fas fa-edit"></i></a></td>

                    <td> 
                        <form action="/cryptocurrencies/{{$cryptocurrency->id}}" method="post">
                            {{csrf_field()}}
                            <input type="hidden" name="_method" value="delete" />
                            <button type="submit" class="admin-delete  btn btn-danger mx-3" onclick='return confirm("Êtes-vous sûr de vouloir supprimer {{$cryptocurrency->name}} ?")'><i class="fas fa-trash-alt"></i></button>
                            <!--<button type="submit" class="admin-delete dropdown-item" onclick='return confirm("Êtes-vous sûr de vouloir supprimer {{$cryptocurrency->name}} ?")'><i class="fas fa-trash-alt"></i>Supprimer</button>-->
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </section>
@endsection 