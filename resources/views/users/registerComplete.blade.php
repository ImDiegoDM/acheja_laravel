@extends('layout.base')

@section('top')
  <div class="container-fluid">
    <div class="row m-0">
      <div class="col-sm-7 py-3 px-0">
        <h1 class="text-center menu-name smooth-border" style="max-width:90%;">Adicionar usuario</h1>
      </div>
      <div class="col-sm-5 py-3">
        <div class="row">
          <div class="col-sm-12">
            <img src="{{ URL::asset('img/acheja.png')}}" class="col-sm-6 px-0 mt-2" alt="">
            <h5 class="d-inline-block float-sm-right mt-3">
              <i class="fa fa-user-circle m-1" style="color: #00aede;" aria-hidden="true"></i>
              {{auth()->user()->name}}</h5>
            </div>
          </div>
        </div>
      </div>
  </div>
@endsection

@section('content')
  <div class="myContainer">
    <h1>Usuario cadastrado com sucesso!</h1>
    <a class="btn btn-confirm" href="./home">Voltar</a>
  </div>
@endsection
