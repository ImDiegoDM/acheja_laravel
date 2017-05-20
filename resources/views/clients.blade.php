@extends('layout.base')

@section('top')
  <div class="container-fluid">
    <div class="row m-0">
      <div class="col-sm-8 py-3 px-0">
        <h1 class="text-center menu-name smooth-border" style="max-width:90%;">Gestão de clientes</h1>
      </div>
      <div class="col-sm-4 py-3">
        <div class="row">
          <div class="col-sm-12">
            <h1 class="d-inline-block">ache já</h1>
            <h5 class="d-inline-block float-sm-right mt-3">
              <i class="fa fa-user-circle m-1" style="color: #2abca1;" aria-hidden="true"></i>
              Usuario</h5>
            </div>

          </div>
        </div>
      </div>

  </div>
@endsection

@section('content')
  todo->  mostrar meus Clients
  <div class="row">
    <div class="col-sm-3 col-xl-2">
      <div class="list-group" style="">
        <h4 class="list-group-item">Categorias</h4>
        @foreach ($categories as $cat)
          <a href="" class="list-group-item">{{$cat->name}}</a>
        @endforeach
        <a href="" class="list-group-item active"> Todos</a>
      </div>
    </div>
    <div class="col-sm-6">
      @foreach ($clients as $client)
        <div class="d-block myCard" style="width:100%">
          <img class="" style="width:100px; height:auto;" src="img/logo.png" alt="Card image cap">
          <p class="d-inline-block" style="vertical-align: top;">
            {{$client->name}} <br>
            {{$client->address}} @if($client->phone) <br>
            {{$client->phone}} @endif <br>
            <i>{{$client->category->name}}</i>
          </p>
          <p class="d-block" style="font-size:12px;font-weight: bold;;position:absolute;bottom:.5rem;right:1.5rem;">
          Cliente desde: {{ $client->created_at->setTimezone('-3')->format('d/m/Y')}}</p>
          <div class="row" style="overflow:auto;">
          </div>
        </div>
      @endforeach
    </div>
  </div>
@stop
