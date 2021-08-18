@extends('layouts.app')

@section('content')
    <section class="p-3">
        <p>Liste des cryptomonnaies</p>
        <table style="width:100%;">
            <thead>
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
    <section>
        <h2>My wallet</h2>
        @foreach($wallet as $w)
            {{$w->total}}
        @endforeach
    </section>
@endsection