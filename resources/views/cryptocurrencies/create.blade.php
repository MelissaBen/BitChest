@extends('layouts.app')

@section('content')
    <section class="admin-header">
        <h2>Ajouter une cryptomonnaie</h2>
    </section>
    
    <section class="container error-message">
        @if(!empty($errors->first()))
            <div class="alert alert-danger">
                {{$errors->first()}}
            </div> 
        @endif 
    </section>
    
    <div class="admin-form container">
        {!! Form::open(['url' => '/cryptocurrencies', 'enctype' => 'multipart/form-data']) !!}
            <div class="form-group">
                {!! Form::label('name', "Nom") !!}
                {!! Form::text('name', "", ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('image', "image") !!}
                {!! Form::text('image', "", ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('price', "Prix") !!}
                {!! Form::text('price', "", ['class' => 'form-control']) !!}
            </div>
            
     
            {!! Form::submit('Ajouter',  ['class' => 'create-btn']) !!}
        {!! Form::close() !!}
    </div>
 
@stop