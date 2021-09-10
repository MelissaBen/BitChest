@extends('layouts.app')

@section('content')
    <div class="container">
        @if($walletActions)
            <table>
                <thead>
                    <th>Date d'achat</th>
                    <th>Investissement</th>
                </thead>
                <tbody>
                    @foreach($walletActions as $walletAction)
                        <tr>
                        
                            <td>
                                {{$walletAction->created_at}}
                            </td>
                            <td>
                            {{$walletAction->total}} €
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
        <div class="alert alert-primary text-center" role="alert">
            Vous n'avez pas encore effectué d'achat pour ce portefeuille !
        </div>
        @endif

    </div>
@stop