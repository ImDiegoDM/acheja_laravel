@extends('layout.base')

@section('top')
  <div class="container-fluid">
    <div class="row m-0">
      <div class="col-sm-2 pt-2 px-0">
        <a href="{{env('APP_URL').'/admin/home'}}"><img src="{{  env('APP_URL').('/public/img/acheja.png')}}" class="p-relative horizontal-center " style="width:100%;" alt=""></a>
      </div>
      <div class="col-sm-7 pt-2 ">
        <h3 class="p-relative horizontal-center float-sm-right text-center menu-name smooth-border" style="width:90%;">Adicionar Usuario</h3>
      </div>
      <div class="col-sm-3">
        @include('layout.user')
      </div>
  </div>
  <hr class="mt-2 mb-4">
@endsection

@section('content')
  <div class="myContainer">
    <h1>Dados do usuario</h1>
    <form class="mx-4 row" action="{{ env('APP_URL').('/public/admin/users')}}" method="post">
      {{ csrf_field() }}
      <div class="form-group col-sm-9">
        <label for="name">Nome</label>
        <input type="text" class="form-control" id="name" name="name" required value="">
      </div>
      <div class="form-group col-sm-3">
        <label for="user_type_id">Tipo:</label>
        <select type="text" class="form-control" id="user_type_id" required name="user_type_id" value="">
          @foreach ($user_types as $type)
            <option @if($type->id==2) selected @endif value="{{$type->id}}">{{$type->name}}</option>
          @endforeach
        </select>
      </div>
      <div class="form-group col-sm-7">
        <label for="email">E-mail</label>
        <input type="email" class="form-control" id="email" name="email" value="">
      </div>
      <div class="form-group col-sm-5">
        <label for="phone">Telefone</label>
        <input type="text" class="form-control" id="phone" name="phone" value="">
      </div>
      <div class="form-group col-sm-12">
        <label for="have_acess">Dar acesso?</label>
        <input type="checkbox" class="" id="have_acess" name="have_acess" value="">
      </div>
      <div class="form-group mx-auto ">
        <div class="col-sm-12" style="margin:auto;">
          <input type="submit" class="btn btn-confirm mx-3" name="button" value="Publicar"></input>
          <a class="btn btn-back float-sm-right mx-3" href="" onclick="goBack()" name="button">Voltar</a>
        </div>
      </div>
      <div class="form-group col-sm-12">
        @include('layout.errors')

      </div>
    </form>
  </div>
@endsection
