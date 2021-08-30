@extends('layouts.app')
<<<<<<< HEAD

@section('content')
    <section class="container card my-5 p-3" >
        <h2 class="text-center m-2">Liste des cryptomonnaies</h2>
        <table style="width:100%;" class="col-12 table table-hover">
            <thead class="table-info">
                <th>Id</th>
                <th>Logo</th>
                <th>Nom</th>
                <th>Description</th>
                <th>Valeur courante</th>
            </thead>
            <tbody>
                @foreach($cryptocurrencies as $crypto)
                    <tr>
                        <td>{{$crypto->id}}</td>
                        <td>{{$crypto->image}}</td>
                        <td>{{$crypto->name}}</td>
                        <td>{{$crypto->description}}</td>
                        <td>{{$crypto->price}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </section>
    <section  class="container card ">
        <h2 class="text-center m-2">My wallet</h2>
        @foreach($wallet as $w)
            {{$w->total}}
        @endforeach
    </section>
@endsection
=======
<style>

.box select {
  background-color: #0563af;
  color: white;
  width:150px;
  padding:2px 5px;
  border: none;
  border-radius:5px;
  font-size: 18px;
  -webkit-appearance: none;
  appearance: none;
  outline: none;
}


.box:hover::before {
  color: rgba(255, 255, 255, 0.6);
  background-color: rgba(255, 255, 255, 0.2);
}

.box select option {
  padding: 30px;
}
</style>
@section('content')

    
    <div class="container">
        <section class="mt-5 mb-3 mx-4" style="background:#1B1E3D;padding:20px;border-radius:5px;border:1px solid #D4DCFF50;box-shadow:0 2px 20px #616490;">
            <section class="row mt-3 mb-5">
                <div class="col-md-6 col-sm-12 col-xs-12 d-flex align-items-center">
                    <div class="d-flex justify-content-center align-items-center">
                        <img id="cryptoIcon" class="mr-2" src="/images/{{$crypto[0]->image}}.png"  alt="{{$crypto[0]->image}} logo" />
                        <h2 id="cryptoRate" style="font-size:35px;margin:0;font-weight:bold;color:#FFF;">Bitcoin</h2>
                        <div class=" d-flex align-items-center justify-content-center ml-3 pl-3" style="border-left:1px solid #fff;">
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
                <example-component/>
            </section>
        </section>

        <section class="row mx-4 mt-4">
            <div class="col-md-4 pl-0">
                <div style="background:#1B1E3D;padding:20px;border-radius:5px;border:1px solid #D4DCFF50;box-shadow:0 2px 20px #616490;">
                    <table style="width:100%;">
                        <caption style="caption-side:top;font-size:32px;color:#D4DCFF;padding-top:0;font-weight:bold;">Prix aujourd'hui</caption>
                        <thead>
                            <th>Cryptomonnaies</th>
                            <th></th>
                            <th>Valeur</th>
                        </thead>
                        <tbody>
                            @foreach($cryptoRanks as $key => $cryptoRank)
                                <tr style="line-height:37px;">
                                    <td>
                                        <img class="mr-2" src="/images/{{$cryptoRank->image}}.png" alt="">
                                        <span class="mr-2" style="font-size:20px;">{{$key + 1}}</span>
                                        <span class="mr-2" style="font-size:20px;">{{$cryptoRank->name}}</span>
                                    </td>
                                    <td>
                                        
                                    </td>   
                                    <td>
                                        <span style="font-size:20px;">{{$cryptoRank->price}} €</span>
                                    </td>
                                </tr>
                                
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            
            <div class="col-md-8" >
                <div class="row">
                    <div class="col-md-12 pr-0">
                        <div  style="background:#1B1E3D;padding:20px;border-radius:5px;border:1px solid #D4DCFF50;box-shadow:0 2px 20px #616490;"> 
                            <p style="font-size:32px;color:#D4DCFF;padding-top:0;font-weight:bold;">Détails</p>
                            <div class=" d-flex align-items-center ">
                                <p style="margin:0;font-size:18px;">1 bitcoin vaut : <span id="todayCrypto" style="font-size:28px;letter-spacing:1px;font-weight:bold;">{{$crypto[0]->price}}</span> € aujourd'hui</p>
                            </div>
                            
                            <div class="d-flex align-items-center">
                                <p style="margin:0;font-size:18px;">1 bitcoin valait <span id="yesterdayCrypto" style="font-size:25px;letter-spacing:1px;font-weight:bold;">{{$yesterdayCrypto[0]->price}}</span> € hier</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>  
        </section>
    </div>
    
@stop
>>>>>>> a5b0eccdcf43b8767e3e05aa5f8a6b0656d62a38
