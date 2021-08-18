@extends('layouts.app')

@section('content')
    <section class="admin-header">
        <h2>Modifier {{$user->firstname}}</h2>
    </section>
    
    <section class="container error-message">
        @if(!empty($errors->first()))
            <div class="alert alert-danger">
                {{$errors->first()}}
            </div> 
        @endif 
    </section>
    
    <div class="admin-form container">
        {!! Form::model($user, ['route' => ['users.update', $user->id], 'method' => 'put', 'enctype' => 'multipart/form-data']) !!}
            <div class="form-group">
                {!! Form::label('firstname', "Prénom") !!}
                {!! Form::text('firstname', "$user->firstname", ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('lastname', "Nom") !!}
                {!! Form::text('lastname', "$user->lastname", ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('email', "Email") !!}
                {!! Form::text('email', "$user->email", ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('password', "Password") !!}
                {!! Form::text('password', "", ['class' => 'form-control']) !!}
            </div>
            
            <div class="form-group">
                {!! Form::label('role_id', "Rôle :") !!}
                <select name="role_id" class="form-control">
                    <option value="0"></option>
                    @foreach($roles as $role)
                    <option value="{{$role->id}}">{{$role->name}}</option>
                    @endforeach
                </select>
            </div>
            {!! Form::submit('Ajouter',  ['class' => 'edit-btn']) !!}
        {!! Form::close() !!}
    </div>
 
@stop