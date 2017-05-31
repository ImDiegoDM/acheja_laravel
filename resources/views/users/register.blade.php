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
    <h1>Dados do usuario</h1>
    <form class="mx-4 row" action="{{URL::asset('users')}}" method="post">
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
