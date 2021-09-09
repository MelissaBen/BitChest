@extends('layouts.app')

@section('content')
    @role('admin')
        <section style="margin-bottom:20px;display:flex;justify-content:space-between;align-items:center;background:#FFF;padding: 20px;">
            <h2>Cours des cryptomonnaies</h2>
        </section>
  
    @endrole
   
    <div class="container">
        <section class="mb-3 mx-4 card" style="padding:20px;border-radius:5px;">
            <section class="row mt-3 mb-5">
                <div class="col-md-6 col-sm-12 col-xs-12 d-flex align-items-center">
                    <div class="d-flex justify-content-center align-items-center">
                        <img id="cryptoIcon" class="mr-2" src="/images/{{$crypto[0]->image}}"  alt="{{$crypto[0]->name}}-logo" />
                        <h2 id="cryptoRate" style="font-size:35px;margin:0;font-weight:bold;">Bitcoin</h2>
                        <div class=" d-flex align-items-center justify-content-center ml-3 pl-3" style="border-left:1px solid #313131;">
                            <p class="d-flex align-items-center" style="margin:0;display:none;font-size:30x;">
                                <i id="icon" class="fas fa-chart-line" style="font-size:55px;"></i>
                                <span id="valueForToday" style="font-size:34px;"></span> €
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-sm-12 col-xs-12 d-flex justify-content-md-end justify-content-sm-start text-right">
                    <form class="box m-0">
                        <label for="chartSwitcher" class="mr-3" style="font-size:18px;margin:0;">Choisir une cryptomonnaie </label>
                        <select id="chartSwitcher">
                            @foreach($crypto as $id => $c)
                                <option value="{{$c->id}}">{{$c->name}}</option>
                            @endforeach
                        </select>
                    </form>   
                
                </div>
            </section>
        
            <section>
                <crypto-rates/>
            </section>
        </section>

        <section class="row mx-4 mt-4">
            <div class="col-md-7 pl-0">
                <div class="card" style="padding:20px;border-radius:5px;">
                    <table style="width:100%;" class="col-12 table table-hover table-responsive">
                        <caption style="caption-side:top;color:#313131;font-size:32px;padding-top:0;font-weight:bold;">Prix aujourd'hui</caption>
                        <thead class="table-info">
                            <th>Cryptomonnaies</th>
                            <th></th>
                            <th>Valeur</th>
                        </thead>
                        <tbody>
                            @foreach($cryptoRanks as $key => $cryptoRank)
                                <tr style="line-height:37px;" class="bg-white">
                                    <td width="60%">
                                        <img class="mr-2" src="/images/{{$cryptoRank->image}}">
                                        <span class="mr-2" style="font-size:20px;">{{$key + 1}}</span>
                                        <span class="mr-2" style="font-size:20px;">{{$cryptoRank->name}}</span>
                                    </td>
                                    <td width="10%">
                                        
                                    </td>   
                                    <td width="30%">
                                        <span style="font-size:20px;">{{$cryptoRank->price}} €</span>
                                    </td>
                                </tr>
                                
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            
            <div class="col-md-5" >
                <div class="row">
                    <div class="col-md-12 pr-0 ">
                        <div class="card" style="padding:20px;border-radius:5px;"> 
                            <p style="font-size:32px;padding-top:0;font-weight:bold;">Détails</p>
                            <div class=" d-flex align-items-center ">
                                <p style="margin:0;font-size:18px;">Valeur d'ajourd'hui : <span id="todayCrypto" style="font-size:28px;letter-spacing:1px;font-weight:bold;">{{$crypto[0]->price}}</span> €</p>
                            </div>
                            
                            @if(!empty($yesterdayCrypto))
                            <div class="d-flex align-items-center">
                                <p style="margin:0;font-size:18px;">Valeur d'hier :  <span id="yesterdayCrypto" style="font-size:25px;letter-spacing:1px;font-weight:bold;">{{$yesterdayCrypto[0]->price}}</span> €</p>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>  
        </section>
    </div>
    
@stop
