@extends('layouts.app')

@section('content')
    <section class="container card my-5 p-3" >
        <h2 class="text-center m-2">Liste des cryptomonnaies</h2>
        <table style="width:100%;" class="col-12 table table-hover">
            <thead class="table-info">
                <th>Id</th>
                <th>Logo</th>
                <th>Nom</th>
                <th>Description</th>
                <th>Valeur courante</th>
            </thead>
            <tbody>
                @foreach($cryptocurrencies as $crypto)
                    <tr>
                        <td>{{$crypto->id}}</td>
                        <td>{{$crypto->image}}</td>
                        <td>{{$crypto->name}}</td>
                        <td>{{$crypto->description}}</td>
                        <td>{{$crypto->price}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </section>
    <section  class="container card ">
        <h2 class="text-center m-2">My wallet</h2>
        @foreach($wallet as $w)
            {{$w->total}}
        @endforeach
    </section>
@endsection