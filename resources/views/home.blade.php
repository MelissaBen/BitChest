@extends('layouts.app')

@section('content')

@role('admin')
    <div style="display:flex;">
        <ul class="nav flex-column" style="width:250px;position:fixed;height:100%;background:red;">
            <li class="nav-item">
                <a class="nav-link active" href="#">Roles</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Utilisateurs</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Cryptomonnaies</a>
            </li>
        
        </ul>
      
        <div class="container" style="margin-left:250px;">
            <div class="row w-100">
                <div class="col-md-12">
                    test
                </div>
            </div>
        </div>
    </div>
   
 
    @endrole

@endsection
