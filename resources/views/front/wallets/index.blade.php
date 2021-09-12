@extends('layouts.app')


@section('content')



<section class="userwallets container">
  <section class="mt-3 p-3 bg-alice">
    <section>
      <h2>Solde de mon compte</h2>
      <p>{{$userWallet->solde}} €</p>
    </section>
  </section>

  <section class="container p-0">
        @if(Session::has('error')) 
            <div class="alert alert-danger">
                {{Session::get('error')}}
            </div>
            {{Session::put('error', null)}}

        @elseif(Session::has('success'))
          <div class="alert alert-success">
                {{Session::get('success')}}
          </div>
          {{Session::put('success', null)}}
        @endif
</section>
  
  <div class="d-flex align-items-center justify-content-between my-3">
    <h2><i class="fas fa-wallet"></i> Mes portefeuilles</h2>
    <a href="/wallets/create"><i class="fas fa-plus-circle"></i> Créer un nouveau portefeuille</a>
  </div>

<div class="row">
    @foreach($cryptoWallets as $key => $cryptoWallet)
    <div class="col-sm-6 mb-5">
    <div class="card position-relative">

    <form action="/wallets/{{$cryptoWallet->id}}" method="post">
      {{csrf_field()}}
      <input type="hidden" name="_method" value="delete" />
      <button type="submit" class="close" aria-label="Close" 
        onclick='return confirm("Êtes-vous sûr de vouloir supprimer ce portefeuille ? ")'>
        <span aria-hidden="true">&times;</span>
      </button>
    </form>




      <div class="card-body">
        <div class="d-flex justify-content-between">
          <p class="totalCrypto d-flex align-items-center m-0">
            @if(file_exists(public_path('images/' . $cryptoWallet->image)))
                <td><img width="40"height="32" class="pr-2" src="/images/{{$cryptoWallet->image}}" alt="crypto logo"></td>
            @else
                <td><img width="40" height="32" class="pr-2" src="{{asset('storage/images/'.$cryptoWallet->image) }}" alt="crypto logo">
            @endif
            <span>{{$cryptoWallet->total . ' ' . $cryptoWallet->name}}</span>
          </p>
          <form action="/wallets/sell/{{$cryptoWallet->id}}" method="get">
          {{csrf_field()}}
          <input type="hidden" name="_method" value="0" />
          <button type="submit" class="sellWalletButton rounded"   
            onclick='return confirm("Êtes-vous sûr de vendre le contenu de votre portefeuille pour {{ round($rate[$key] * $cryptoWallet->total) }} € ?")'>
            Vendre pour <span>{{round($rate[$key]* $cryptoWallet->total, 2) }} €</span>
          </button>
        </form>
            </div>
       
        <div>
            
            <p class="m-0">Valeur du jour = <?php echo($rate[$key])?> €</p>
          </div>
          
    <div class="modal" id="modal{{$cryptoWallet->id}}">
    <div class="modal-dialog">
      <div class="modal-content">

       
        <form action="/wallets/buy/{{$cryptoWallet->id}}" method="get" class="p-5">
            {{csrf_field()}}
            <div class="form-group m-2">
                <label for="cryptoCashValueWanted" class="d-block text-center">Combien souhaitez-vous investir pour du {{$cryptoWallet->name}} ?</label>
                <input type="number" step="any" class="form-control w-100 mx-auto my-4 text-center"  style="max-width:60%;" name="cryptoCashValueWanted"  placeholder="Exemple : 300.50"/>
            </div>
            <button type="submit" class="admin-delete mx-auto d-block btn btn-outline-primary m-2" 
            onclick='return confirm("Êtes-vous sûr de vouloir acheter du {{$cryptoWallet->name}} ?")'>Acheter {{$cryptoWallet->name}} </button>
        </form>
      </div>
    </div>
  </div>

  <div class="d-flex justify-content-between align-items-center mt-4">
      <button type="button" data-toggle="modal" data-target="#modal{{$cryptoWallet->id}}" class="btn btn-secondary"><i class="fas fa-shopping-basket mr-2"></i>Acheter</button>
      <div class="totalinvest">
        <p>Total investi pour ce portefeuille : <span>-{{$total[$key]}} €</span></p>
        <a class="d-block text-right" href="/wallets/{{$cryptoWallet->id}}">Détails</a>
      </div>
  </div>
        

      </div>
    </div>
  </div>

    @endforeach

</section>


@endsection