@extends('layout.base')

@section('top')
  <div class="row mx-0 px-2">
    <div class="col-sm-8 pt-sm-2">
      <h1>ache já</h1>
    </div>
    <div class="col-sm-4 pt-sm-4" style="">
      <h5 class="float-sm-right"><i class="fa fa-user-circle m-1" style="color: #2abca1;" aria-hidden="true"></i>Usuario</h5>
    </div>
  </div>
  <hr>
@stop

@section('content')
  <div class="row d-flex mx-0 flexDislpayCenter">
    <h4 class="text-center menu-name smooth-border"><i class="fa fa-cog mr-2" aria-hidden="true"></i>Administração geral de dados</h4>
  </div>
  <div class="row d-flex mx-0 mt-2 mt-sm-4 flexDislpayCenter">
    <a class="col-sm-3 col-xl-2 mx-sm-2 mx-5 d-flex flexDislpayCenter smooth-border noDeco menu-iten" href="./clients">
      <div class="d-block">
        <i class="fa fa-file fa-3x d-block" style="margin:auto; width:.8em;" aria-hidden="true"></i>
        <p class="text-center mb-0">gestão de clientes</p>
      </div>
    </a>
    <a class="col-sm-3 col-xl-2 mx-sm-2 mx-5 d-flex flexDislpayCenter smooth-border noDeco menu-iten" href="">
      <div class="d-block">
        <i class="fa fa-plus-circle fa-3x d-block" style="margin:auto; width:.8em;" aria-hidden="true"></i>
        <p class="text-center mb-0">adicionar de cliente</p>
      </div>
    </a>
    <a class="col-sm-3 col-xl-2 mx-sm-2 mx-5 d-flex flexDislpayCenter smooth-border noDeco menu-iten" href="">
      <div class="d-block">
        <i class="fa fa-align-justify fa-3x d-block" style="margin:auto; width:.8em;" aria-hidden="true"></i>
        <p class="text-center mb-0">gestão de conteudo</p>

      </div>
    </a>
  </div>
  <div class="row d-flex mt-2 mx-0 flexDislpayCenter">
    <a class="col-sm-3 col-xl-2 mx-sm-2 mx-5 d-flex flexDislpayCenter smooth-border noDeco menu-iten" href="">
      <div class="d-block">
        <i class="fa fa-user-secret fa-3x d-block" style="margin:auto; width:.8em;" aria-hidden="true"></i>
        <p class="text-center mb-0">usuarios</p>

      </div>
    </a>
    <a class="col-sm-3 col-xl-2 mx-sm-2 mx-5 d-flex flexDislpayCenter smooth-border noDeco menu-iten" href="">
      <div class="d-block">
        <i class="fa fa-newspaper-o fa-3x d-block" style="margin:auto; width:1.2em;" aria-hidden="true"></i>
        <p class="text-center mb-0">promoções e eventos</p>
      </div>
    </a>
  </div>
@stop
