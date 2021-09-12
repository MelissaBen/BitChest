@extends('layouts.app')

@section('content')
    <section class="admin-header">
        <h2 class="text-center m-3 text-black">Ajouter un rôle</h2>
    </section>
    <section class="container error-message">
        @if(!empty($errors->first()))
            <div class="alert alert-danger">
                {{$errors->first()}}
            </div> 
        @endif 
    </section>

    
    
    <div class="admin-form card my-5 p-4 mr-3 ml-4 ">
        {!! Form::open(['url' => '/roles', 'enctype' => 'multipart/form-data']) !!}
            <div class="form-group">
                {!! Form::label('name', "Nom") !!}
                {!! Form::text('name', "", ['class' => 'form-control']) !!}
            </div>
           
            {!! Form::submit('Ajouter',  ['class' => 'create-btn btn-primary']) !!}
        {!! Form::close() !!}
    </div>
 
@stop

