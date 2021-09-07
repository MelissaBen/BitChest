@extends('layouts.app')


@section('content')
<section class="container">
  <section class="mt-3 p-3" style="background:alice;">
    <section>
      <h2 style=>Solde de mon compte</h2>
      <p>{{$userWallet->solde}} €</p>
    </section>
  </section>
  
  <div class="d-flex align-items-center justify-content-between my-3">
    <h2><i style="font-size:34px;margin-right:10px;" class="fas fa-wallet"></i> Mes portefeuilles</h2>
    <a href="/wallets/create"><i class="fas fa-plus-circle"></i> Créer un nouveau portefeuille</a>
  </div>

<div class="row">
    @foreach($cryptoWallets as $key => $cryptoWallet)
    <div class="col-sm-6" style="margin-bottom:30px;">
    <div class="card">
      <div class="card-body">
        <div style="display:flex;justify-content:space-between;">
          <h2 style="display:flex;align-items:center;margin:0;">
            <img class="pr-2" src="/images/{{$cryptoWallet->image}}.png" alt="">
            <span>{{$cryptoWallet->total . ' ' . $cryptoWallet->name}}</span>
          </h2>

          <button type="button" data-toggle="modal" data-target="#ttes{{$cryptoWallet->id}}" class="btn btn-secondary"><i class="fas fa-shopping-basket"></i>Acheter</button>
        </div>
       
        <div>
            
            <p style="margin:0;">Valeur du jour = <?php echo($rate[$key][0])?> €</p>
          </div>





          
    <div class="modal" id="ttes{{$cryptoWallet->id}}">
    <div class="modal-dialog" style="position:absolute;top:50%;left:50%;transform:translate(-50%,-50%);max-width:600px;width:100%;">
      <div class="modal-content">

        <form action="/wallets/buy/{{$cryptoWallet->id}}" method="get">
            {{csrf_field()}}
            <div class="form-group m-2">
                  <label for="updatee">Nombre de {{$cryptoWallet->name}} voulu : </label>
                  <input style="max-width:100px;width:100%;"class="form-control" name="updatee"  />
             </div>
            <button type="submit" class="admin-delete btn btn-outline-primary m-2" onclick='return confirm("Êtes-vous sûr de vouloir acheter {{$cryptoWallet->name}} {{$cryptoWallet->id}} ?")'>Acheter {{$cryptoWallet->name}} au cours actuel</button>
                          
        </form>
        <form action="/wallets/buy/{{$cryptoWallet->id}}" method="get" class="pt-5">
            {{csrf_field()}}
            <div class="form-group m-2">
                <label for="updateee">rentrer une valeur en euros</label>
                <input style="max-width:100px;width:100%;"class="form-control" name="updatee"  />
            </div>
            <button type="submit" class="admin-delete btn btn-outline-primary m-2" onclick='return confirm("Êtes-vous sûr de vouloir supprimer ce portefeuille {{$cryptoWallet->id}} ?")'>Acheter {{$cryptoWallet->name}} </button>
        </form>
      </div>
    </div>
  </div>

        <div style="display:flex;justify-content:space-between;align-items:flex-end;">
        
        <div>
        <p style="font-weight:bold;margin:0;font-style:italic;">Total investi pour ce portefeuille : <span style="font-weight:bold;color:#e86f63;">-{{$total[$key]}} €</span></p>
        
        
        </div>
        <form action="/wallets/sell/{{$cryptoWallet->id}}" method="get">
                            {{csrf_field()}}
                            <input type="hidden" name="_method" value="0" />
                            <button type="submit" style="background:none;border:;font-size:24px;"  onclick='return confirm("Êtes-vous sûr de vendre {{$rate[$key][0]* $cryptoWallet->total }}?")'>Vendre pour <span style="color:#43ca79;">{{$rate[$key][0]* $cryptoWallet->total }} €</span></button>
        </form>
        </div>
      
 
      </div>
    </div>
  </div>

    @endforeach

</section>


@endsection