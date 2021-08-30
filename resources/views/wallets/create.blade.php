@extends('layouts.app')

@section('content')

    <section class="container error-message">
        @if(!empty($errors->first()))
            <div class="alert alert-danger">
                {{$errors->first()}}
            </div> 
        @endif 
    </section>
    
    <div class="admin-form container">
        
    <h2>Créer un nouveau portefeuille</h2>
        {!! Form::open(['url' => '/wallets', 'enctype' => 'multipart/form-data']) !!}
            <div class="form-group">
                <select name="id_cryptocurrency" >
                    @foreach($cryptocurrencies as $cryptocurrency)
                    <option value="{{$cryptocurrency->id}}">{{$cryptocurrency->name}}</option>
                    @endforeach
                </select>
                
            </div>

     
            {!! Form::submit('Ajouter',  ['class' => 'create-btn']) !!}
        {!! Form::close() !!}
    </div>
 
@stop