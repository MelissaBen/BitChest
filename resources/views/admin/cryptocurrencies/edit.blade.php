@extends('layouts.app')

@section('content')
    <section class="admin-header">
        <h2 class="text-center text-white m-3">Modifier {{$cryptocurrency->name}}</h2>
    </section>
    
    <section class="container error-message">
        @if(!empty($errors->first()))
            <div class="alert alert-danger">
                {{$errors->first()}}
            </div> 
        @endif 
    </section>
    
    <div class="admin-form mr-3 ml-4 card my-5 p-4 ">
        {!! Form::model($cryptocurrency, ['route' => ['cryptocurrencies.update', $cryptocurrency->id], 'method' => 'put', 'enctype' => 'multipart/form-data']) !!}
            <div class="form-group">
                {!! Form::label('name', "Nom") !!}
                {!! Form::text('name', "$cryptocurrency->name", ['class' => 'form-control']) !!}
            </div>
         
            {!! Form::label('image', "Image") !!}
            
            @if(file_exists(public_path('images/' . $cryptocurrency->image)))
            <img class="d-block" width="50" src="/images/{{$cryptocurrency->image }}" alt="">
            
            @else
            <img class="d-block" width="50" src="{{asset('storage/images/'.$cryptocurrency->image) }}" alt="crypto_logo">
            @endif
            
         
            @if($cryptocurrency->image != "")
           
            <a class="deleteImage" href="/cryptocurrencies/deleteImage/{!!$cryptocurrency->id!!}" onclick='return confirm("Êtes-vous sûr de vouloir supprimer cette image ?")'>
                <i class="fas fa-trash-alt"></i>
                <span>Supprimer l'image pour en télécharger une nouvelle</span>
            </a> 
            @else 
            <div class="form-group">
                {!! Form::file('image',  ['class' => 'form-control']) !!}
            </div>
            @endif

           
        
            {!! Form::submit('Ajouter',  ['class' => 'edit-btn btn-primary']) !!}
        {!! Form::close() !!}
    </div>
 
@stop
