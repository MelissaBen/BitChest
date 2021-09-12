@extends('layouts.app')

@section('content')
    @role('admin')
        <section class="d-flex justify-content-between align-items-center bg-white p-4">
            <h2>Cours des cryptomonnaies</h2>
        </section>
  
    @endrole
   
    <div class="container margin-bottom">
        <section class="mb-3 mx-4 card card-crypto">
            <section class="row mt-3 mb-5">
                <div class="col-md-6 col-sm-12 col-xs-12 d-flex align-items-center">
                    <div class="d-flex justify-content-center align-items-center">
                        <img id="cryptoLogo" class="mr-2" src="/images/{{$crypto[0]->image}}" alt="{{$crypto[0]->name}}-logo" />
                        <h2 id="cryptoRateName" class="m-0">Bitcoin</h2>
                        <div class="crypto d-flex align-items-center justify-content-center ml-3 pl-3">
                            <p class="d-flex align-items-center m-0 d-none">
                                <i id="icon" class="fas fa-chart-line"></i>
                                <span id="valueForToday"></span> €
                            </p>
                        </div>
                    </div>
                        
                </div>

                <div class="col-md-6 col-sm-12 col-xs-12 d-flex justify-content-md-end justify-content-sm-start text-right">
                    <form class="box m-0">
                        <label for="chartSwitcher" class=" chartswitcherlabel m-0 mr-3" >Choisir une cryptomonnaie </label>
                        <select id="chartSwitcher">
                            @foreach($crypto as $id => $c)
                                <option value="{{$c->id}}">{{$c->name}}</option>
                            @endforeach
                        </select>
                    </form>   
                
                </div>
             <div class="mt-3">
                @if(!empty($yesterdayCrypto))
                    <div class="d-flex align-items-center pl-4 mr-4">
                        <p class="m-0 cryptorecentrate" >Valeur d'hier :  <span id="yesterdayCrypto" >{{$yesterdayCrypto[0]->price}}</span> €</p>
                    </div>
                @endif
                <div class=" d-flex align-items-center ml-4 ">
                    <p class="m-0 cryptorecentrate" >Valeur pour aujourd'hui : <span id="todayCrypto" >{{$crypto[0]->price}}</span> €</p>
                </div>
             </div>
                            
                            
            </section>
        
            <section>
                <crypto-rates/>
            </section>
        </section>

        <section class="row mx-4 mt-4">
            <div class="col-md-12 pl-0">
                <div class="card rounded p-4">
                    <table class=" cryptoRanks col-12 table table-hover table-responsive w-100">
                        <caption>Prix aujourd'hui</caption>
                        <thead class="table-info">
                            <th>Cryptomonnaies</th>
                            <th></th>
                            <th>Valeur</th>
                        </thead>
                        <tbody>
                            @foreach($cryptoRanks as $key => $cryptoRank)
                                <tr class="bg-white">
                                    <td width="60%">
                                        <img width="32px" class="mr-2" src="/images/{{$cryptoRank->image}}" alt="crypto logo">
                                        <span class="mr-2" >{{$key + 1}}</span>
                                        <span class="mr-2" >{{$cryptoRank->name}}</span>
                                    </td>
                                    <td width="10%">
                                        
                                    </td>   
                                    <td width="30%">
                                        <span >{{$cryptoRank->price}} €</span>
                                    </td>
                                </tr>
                                
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            
  
        </section>
    </div>
    
@stop
