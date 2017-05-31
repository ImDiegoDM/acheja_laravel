@extends('layout.base')

@section('top')
  <div class="container-fluid">
    <div class="row m-0">
      <div class="col-sm-7 py-3 px-0">
        <h1 class="text-center menu-name smooth-border" style="max-width:90%;">Gestão de clientes</h1>
      </div>
      <div class="col-sm-5 py-3">
        <div class="row">
          <div class="col-sm-12">
            <img src="./img/acheja.png" class="col-sm-6 px-0 mt-2" alt="">
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
  <div class="row">
    <div class="col-sm-3 col-xl-2 ml-sm-5">
      <div class="list-group" style="">
        <h4 class="list-group-item">Categorias</h4>
        @foreach ($categories as $cat)
          <a href="" class="list-group-item">{{$cat->name}}</a>
        @endforeach
        <a href="" class="list-group-item active"> Todos</a>
      </div>
      <div class="list-group mt-4" style="">
        <h4 class="list-group-item">Cidades</h4>
        @foreach ($cities as $city)
          <a href="" class="list-group-item">{{$city->name}}</a>
        @endforeach
        <a href="" class="list-group-item active"> Todos</a>
      </div>
    </div>
    <div class="col-sm-6 ml-sm-5">
      @foreach ($clients as $client)
        <a href="{{'./client/'.$client->id}}" class="d-block myCard mb-sm-3" style="width:100%">
          @if ($client->logo_url)
            <img class="" style="width:100px; height:auto;" src="{{env('APP_URL') . '/storage/app/' . $client->logo_url}}" alt="Card image cap">
          @else
            <p style="width:100px; height:auto; background-color:#e0e0e0;border-radius:9px; border: dotted #a2a2a2 3px; font-size:12px;" class="d-inline-block text-center p-3">Logo não encontrada, cadastre uma logo</p>
          @endif
          <p class="d-inline-block ml-1" style="vertical-align: top;">
            {{$client->name}} <br>
            {{$client->city->name}} {{$client->city->state_id}} <br>
            {{$client->street}} {{$client->street_number  }} @if($client->phone) <br>
            {{$client->phone}} @endif <br>
            <i>{{$client->category->name}}</i>
          </p>
          <p class="d-block" style="font-size:12px;font-weight: bold;;position:absolute;bottom:0rem;right:1.5rem;">
          Cliente desde: {{ $client->created_at->setTimezone('-4')->format('d/m/Y')}}</p>
          <div class="row" style="overflow:auto;">
          </div>
        </a>
      @endforeach
    </div>
  </div>
@stop
