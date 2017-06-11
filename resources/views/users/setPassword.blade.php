@extends('layout.base')

@section('top')
  <div class="container-fluid">
    <div class="row m-0">
      <div class="col-sm-2 pt-2 px-0">
        <a href="{{env('APP_URL').'/public/home'}}"><img src="{{ URL::asset('img/acheja.png')}}" class="p-relative horizontal-center " style="width:100%;" alt=""></a>
      </div>
    </div>
  </div>
  <hr class="mt-2 mb-4">
@endsection

@section('content')
  <div class="myContainer">
    <h1>Olá, {{$user->name}}</h1>
    <form class="mx-4 row" action="{{env('APP_URL').'/public/user/'.$user->id.'/savePassword'}}" method="post">
      <div class="form-group col-sm-12">para poder usar a nossa plataforma por favor cadastre uma senha.</div>
      {{ csrf_field() }}
      <input type="hidden" name="token" value="{{request()->token}}">
      <div class="col-sm-12">
        <div class="form-group col-sm-6 mx-auto">
          <label for="password">Senha</label>
          <input type="password" class="form-control" id="password" name="password" required value="">
        </div>
        <div class="form-group col-sm-6 mx-auto">
          <label for="password_confirmation">Confirmar Senha</label>
          <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required value="">
        </div>
      </div>
      <div class="form-group mx-auto ">
        <div class="col-sm-12" style="margin:auto;">
          <input type="submit" class="btn btn-confirm mx-3" name="button" value="Publicar"></input>
          <a class="btn btn-back float-sm-right mx-3" href="" onclick="{{env('APP_URL').'/public/login' }}" name="button">Voltar</a>
        </div>
      </div>
      <div class="form-group col-sm-12">
        @include('layout.errors')
      </div>
    </form>
  </div>
@endsection
