@extends('layouts.app')

@section('content')
    <section class="admin-header">
        <h2 class="text-center text-white m-3">Modifier {{$role->name}}</h2>
    </section>
    
    <section class="container error-message">
        @if(!empty($errors->first()))
            <div class="alert alert-danger">
                {{$errors->first()}}
            </div> 
        @endif 
    </section>
    
    <div class="admin-form mr-3 ml-4 card my-5 p-4">
        {!! Form::model($role, ['route' => ['roles.update', $role->id], 'method' => 'put', 'enctype' => 'multipart/form-data']) !!}
            <div class="form-group">
                {!! Form::label('name', "Nom") !!}
                {!! Form::text('name', "$role->name", ['class' => 'form-control']) !!}
            </div>
          
            {!! Form::submit('Modifier',  ['class' => 'edit-btn  btn-primary']) !!}
        {!! Form::close() !!}
    </div>
 
@stop