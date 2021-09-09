@extends('layouts.app')

@section('content')
    <div class="container">
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
    </div>
@stop