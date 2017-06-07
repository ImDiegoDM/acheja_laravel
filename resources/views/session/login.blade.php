@extends('layout.base')

@section('content')
  <!--<div class="jumbotron vertical-center h-100">
    <div class="container">

    </div>
  </div>-->
  <div class="myContainer">
    <div class="vertical-center w-100 h-100">
      <div class="col-sm-9 col-md-6 mx-auto">
        <img src="./img/acheja.png" class="centerXDiv col-sm-12" alt="">
        <p class="text-center mt-1" style="font-size:18px;">PAINEL ADMINISTRATIVO DE DADOS</p>
        <div class="col-sm-9 shadow px-4 pt-4 mx-auto">
          <form class="" action="./login" method="post">
            {{ csrf_field() }}
            <div class="form-group">
              <label for="email">Email:</label>
              <input type="email" class="form-control" name="email" value="">
            </div>
            <div class="form-group">
              <label for="password">Senha:</label>
              <input type="password" class="form-control" id="password" name="password" value="">
            </div>
            <div class="row">
              <div class="col-sm-12 mb-3">
                <input type="checkbox" class=""  name="remeber" value="true"><label for="remeber" class="align-middle" style="font-size:13px;"> Lembrar</label>
                <input type="submit" class="d-inline-block float-right btn btn-confirm" name="" value="Login">
              </div>
            </div>
          </form>
        </div>
        <div class="mt-3">
          @include('layout.errors')
        </div>
      </div>
    </div>
  </div>
@endsection
