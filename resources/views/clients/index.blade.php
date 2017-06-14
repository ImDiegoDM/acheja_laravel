

@extends('layout.base')

@section('top')
  <div class="container-fluid">
    <div class="row m-0">
      <div class="col-sm-2 pt-2 px-0">
        <a href="{{env('APP_URL').'/public/home'}}"><img src="{{ URL::asset('img/acheja.png')}}" class="p-relative horizontal-center " style="width:100%;" alt=""></a>
      </div>
      <div class="col-sm-7 pt-2 ">
        <h3 class="p-relative horizontal-center float-sm-right text-center menu-name smooth-border" style="width:90%;">Gestão de clientes</h3>
      </div>
      <div class="col-sm-3">
        @include('layout.user')
      </div>
  </div>
  <hr class="mt-2 mb-4">
@endsection

@section('content')
  <div class="row">
    <div class="col-sm-3 col-xl-2 ml-sm-5">
      <div class="list-group" style="">
        <h4 class="list-group-item">Categorias</h4>
        @foreach ($categories as $cat)
          <a onclick={{"goToCategory(".$cat->id.")"}} class="<?php
            if(intval(request()->category)==$cat->id){
              //dd(intval(request()->category));
              echo "list-group-item active";
            }
            else {
              echo "list-group-item";
            }
           ?>" >{{$cat->name}}</a>
        @endforeach
        <a onclick="cleanCategory()" class="<?php
        if(intval(request()->category)){
          //dd(intval(request()->category));
          echo "list-group-item";
        }
        else {
          echo "list-group-item active";
        }
         ?>"> Todos</a>
      </div>
      <div class="list-group mt-4" style="">
        <h4 class="list-group-item">Cidades</h4>
        @foreach ($cities as $city)
          <a onclick="{{"goToCity(".$city->id.")"}}" class="<?php
            if(intval(request()->city)==$city->id){
              //dd(intval(request()->category));
              echo "list-group-item active";
            }
            else {
              echo "list-group-item";
            }
           ?>">{{$city->name}}</a>
        @endforeach
        <a onclick="cleanCity()" class="<?php
        if(intval(request()->city)){
          //dd(intval(request()->category));
          echo "list-group-item";
        }
        else {
          echo "list-group-item active";
        }
         ?>"> Todos</a>
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
            {{Helper::mask($client->phone,'(**) ****-****')}} @endif <br>
            <i>{{$client->category->name}}</i>
          </p>
          <p class="d-block" style="font-size:12px;font-weight: bold;position:absolute;right:1.5rem;">
          Cliente desde: {{ $client->created_at->setTimezone('-4')->format('d/m/Y')}}</p>
        </a>
      @endforeach
    </div>
  </div>
  <script src="{{ URL::asset('js/Filter.js')}}" type="text/javascript"></script>
@stop
