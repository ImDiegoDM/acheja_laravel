@extends('layout.base')

@section('top')
  <div class="container-fluid">
    <div class="row m-0">
      <div class="col-sm-2 pt-2 px-0">
        <a href="{{env('APP_URL').'/public/home'}}"><img src="{{ URL::asset('img/acheja.png')}}" class="p-relative horizontal-center " style="width:100%;" alt=""></a>
      </div>
      <div class="col-sm-7 pt-2 ">
        <h3 class="p-relative horizontal-center float-sm-right text-center menu-name smooth-border" style="width:90%;">Editar Cliente</h3>
      </div>
      <div class="col-sm-3">
        @include('layout.user')
      </div>
  </div>
  <hr class="mt-2 mb-4">
@endsection

@section('content')
  <div class="myContainer">
    <h1>Cliente atualizado com sucesso!</h1>
    <a class="btn btn-confirm" href="{{env('APP_URL').'/public/home'}}">Voltar</a>
  </div>
@endsection
