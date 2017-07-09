@extends('layout.base')

@section('top')
  <div class="container-fluid">
    <div class="row m-0">
      <div class="col-sm-2 pt-2 px-0">
        <a href="{{env('APP_URL').'/admin/home'}}"><img src="{{  env('APP_URL').('/public/img/acheja.png')}}" class="p-relative horizontal-center " style="width:100%;" alt=""></a>
      </div>
      <div class="col-sm-7 pt-2 ">
        <h4 class="p-relative horizontal-center float-sm-right text-center menu-name smooth-border" style="width:90%;">Administração geral de dados</h4>
      </div>
      <div class="col-sm-3">
        @include('layout.user')
      </div>
  </div>
  <hr class="mt-2 mb-4">
@stop

@section('content')
  <div class="row d-flex mx-0 mt-2 mt-sm-4 flexDislpayCenter">
    <a class="col-sm-3 col-xl-2 mx-sm-2 mx-5 d-flex flexDislpayCenter smooth-border noDeco menu-iten" href="./clients">
      <div class="d-block">
        <i class="fa fa-file fa-3x d-block" style="margin:auto; width:.8em;" aria-hidden="true"></i>
        <p class="text-center mb-0">gestão de clientes</p>
      </div>
    </a>
    <a class="col-sm-3 col-xl-2 mx-sm-2 mx-5 d-flex flexDislpayCenter smooth-border noDeco menu-iten" href="./clients/register">
      <div class="d-block">
        <i class="fa fa-plus-circle fa-3x d-block" style="margin:auto; width:.8em;" aria-hidden="true"></i>
        <p class="text-center mb-0">adicionar cliente</p>
      </div>
    </a>
    <a class="col-sm-3 col-xl-2 mx-sm-2 mx-5 d-flex flexDislpayCenter smooth-border noDeco menu-iten" href="./content">
      <div class="d-block">
        <i class="fa fa-align-justify fa-3x d-block" style="margin:auto; width:.8em;" aria-hidden="true"></i>
        <p class="text-center mb-0">gestão de conteudo</p>

      </div>
    </a>
  </div>
  <div class="row d-flex mt-2 mx-0 flexDislpayCenter">
    <a class="col-sm-3 col-xl-2 mx-sm-2 mx-5 d-flex flexDislpayCenter smooth-border noDeco menu-iten" href="./users">
      <div class="d-block">
        <i class="fa fa-user fa-3x d-block" style="margin:auto; width:.8em;" aria-hidden="true"></i>
        <p class="text-center mb-0">usuarios</p>
      </div>
    </a>
    <a class="col-sm-3 col-xl-2 mx-sm-2 mx-5 d-flex flexDislpayCenter smooth-border noDeco menu-iten" href="./users/register">
      <div class="d-block">
        <i class="fa fa-user-plus fa-3x d-block" style="margin:auto; width:.8em;" aria-hidden="true"></i>
        <p class="text-center mb-0">Adicionar usuarios</p>
      </div>
    </a>
  </div>
@stop
