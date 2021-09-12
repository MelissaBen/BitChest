@extends('layouts.app')

@section('content')

    <section class="container error-message">
        @if(!empty($errors->first()))
            <div class="alert alert-danger">
                {{$errors->first()}}
            </div> 
        @endif 
    </section> 
    
  
    
    <div class="admin-form container card my-5 p-4">
        
    <h2 class="text-center m-3">Créer un nouveau portefeuille</h2>
        {!! Form::open(['url' => '/wallets', 'enctype' => 'multipart/form-data']) !!}
        <div class="row mt-4">
        @foreach($cryptocurrencies as $cryptocurrency)
        <div class="col-md-4  mb-4">
            
            <input hidden type="checkbox" class="checkcryptocurrency" id="id_cryptocurrency-{{$cryptocurrency->id}}" name="id_cryptocurrency[]" value="{{$cryptocurrency->id}}">
            <div class="card p-3 walletCryptocurrency">
                <label for="id_cryptocurrency-{{$cryptocurrency->id}}" class="d-flex align-items-center">
                    <img width="50" class="pr-2" src="/images/{{$cryptocurrency->image}}" alt="crypto logo">
                    <p class="font-weight-bold m-0" style="font-size:18px;">{{$cryptocurrency->name}}</p>
                </label>
            
            </div>
        </div>
        @endforeach
        </div>
       
            <!--<div class="form-group">
                <select name="id_cryptocurrency" >
                    @foreach($cryptocurrencies as $cryptocurrency)
                    <option value="{{$cryptocurrency->id}}">{{$cryptocurrency->name}}</option>
                    @endforeach
                </select>
                
            </div>-->

     
            {!! Form::submit('Ajouter',  ['class' => 'd-block m-auto create-btn btn btn-primary']) !!}
        {!! Form::close() !!}
    </div>
 
@stop