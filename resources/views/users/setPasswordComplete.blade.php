@extends('layout.base')

@section('top')
  <div class="container-fluid">
    <div class="row m-0">
      <div class="col-sm-2 pt-2 px-0">
        <a href="{{env('APP_URL').'/admin/home'}}"><img src="{{  env('APP_URL').('/public/img/acheja.png')}}" class="p-relative horizontal-center " style="width:100%;" alt=""></a>
      </div>
    </div>
  </div>
  <hr class="mt-2 mb-4">
@endsection

@section('content')
  <div class="myContainer">
      <div class="form-group col-sm-12">Senha cadastrada com sucesso, para pode acessar a nossa plataforma digite o seu e-mail e sua senha na tela de login</div>
      <a class="btn btn-cofirm" href="{{env('APP_URL').'/admin/login' }}"></a>
  </div>
@endsection
