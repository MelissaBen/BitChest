@extends('layouts.app')

@section('content')
    <section class="admin-header">
        <h2>Modifier {{$cryptocurrency->name}}</h2>
    </section>
    
    <section class="container error-message">
        @if(!empty($errors->first()))
            <div class="alert alert-danger">
                {{$errors->first()}}
            </div> 
        @endif 
    </section>
    
    <div class="admin-form container">
        {!! Form::model($cryptocurrency, ['route' => ['cryptocurrencies.update', $cryptocurrency->id], 'method' => 'put', 'enctype' => 'multipart/form-data']) !!}
            <div class="form-group">
                {!! Form::label('name', "Nom") !!}
                {!! Form::text('name', "$cryptocurrency->name", ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('image', "Image") !!}
                {!! Form::text('image', "$cryptocurrency->image", ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('price', "Prix") !!}
                {!! Form::text('price', "$cryptocurrency->price", ['class' => 'form-control']) !!}
            </div>
        
            {!! Form::submit('Ajouter',  ['class' => 'edit-btn']) !!}
        {!! Form::close() !!}
    </div>
 
@stop