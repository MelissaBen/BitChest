@extends('layouts.app')

@section('content')
    <div class="container">
        @if($walletActions)
            
                <table class="table table-hover  w-100">
                    <caption class="text-center">Statistiques portefeuille - {{$totalWalletActions[0]->name}}</caption>
                    <thead class="table-info">
                        <th>Date d'achat</th>
                        <th>Investissement</th>
                        <th>Unités achetés</th>
                    </thead>
                    <tbody>
                        @foreach($walletActions as $walletAction)
                            <tr>
                                <td>{{ \Carbon\Carbon::parse($walletAction->created_at)->format('d-m-Y h:i:s') }}</td>
                                <td>{{$walletAction->total}} €</td>
                                <td>{{$walletAction->gain}}</td>
                            </tr>
                        @endforeach
                    
                    </tbody>
                </table>
    
            <section class="card font-weight-bold p-3 d-flex flex-row justify-content-center align-items-center">
                <p class="m-0 mr-5">Total investi : {{ $totalWalletActions[0]->total }} €</p>
                <p class="m-0 ml-5">Total acheté : {{ $totalWalletActions[0]->gain }}</p>
            </section>
            
        @else
        <div class="alert alert-primary text-center" role="alert">
            Vous n'avez pas encore effectué d'achat pour ce portefeuille !
        </div>
        @endif

    </div>
@stop