@php
  use Carbon\Carbon;
@endphp

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
  <div class="myContainer">
    <div class="row py-3" style={{ $client->actived ? "background-color:#0373a0;color:white;" : "background-color:#7d888c;color:white;" }}>
      <div class="col-sm-6">
        <h1 class="mb-0">{{$client->name}}</h1>
        <h4 class="ml-4">{{$client->category->name}}</h4>
        <div class="d-inline-block" style="font-size:12px;position: absolute; bottom:-29px;">
          <p>Criado em {{$client->created_at->setTimezone('-4')->format('d/m/Y')}} <br> Ativado pela ultima vez em {{$client->last_activated_at->setTimezone('-4')->format('d/m/Y')}}</p>
        </div>
      </div>
      <div class="col-sm-6 pr-5">
        @if ($client->logo_url)
          <img class="d-inline-block float-sm-right" style="width:130px; height:auto;" src="{{env('APP_URL') . '/storage/app/' . $client->logo_url}}" alt="Card image cap">
        @else
          <p style="width:100px; height:auto; background-color:#e0e0e0;border-radius:9px; border: dotted #a2a2a2 3px; font-size:12px;" class="d-inline-block text-center p-3">Logo não encontrada, cadastre uma logo</p>
        @endif
      </div>
    </div>
    <div class="row mx-0 pt-3">
      <div class="col-sm-3 imgBox">
        <a href="">
          <img src="{{env('APP_URL') . '/storage/app/' . $client->photo_1}}" onclick="window.open(this.src)" class="imgShow" alt="">
        </a>
      </div>
      <div class="col-sm-3 imgBox">
        <a href="">
          <img src="{{env('APP_URL') . '/storage/app/' . $client->photo_2}}" onclick="window.open(this.src)" class="imgShow" alt="">
        </a>
      </div>
      <div class="col-sm-3 imgBox">
        <a href="">
          <img src="{{env('APP_URL') . '/storage/app/' . $client->photo_3}}" onclick="window.open(this.src)" class="imgShow" alt="">
        </a>
      </div>
      <div class="col-sm-3 imgBox">
        <a href="">
          <img src="{{env('APP_URL') . '/storage/app/' . $client->photo_4}}" onclick="window.open(this.src)" class="imgShow" alt="">
        </a>
      </div>
    </div>
    <div class="row mx-0 pt-3 ">
      <div class="col-sm-6">
        <div class="">
          <h5>Descrição</h5>
          <p class="ml-3">{{$client->description}}</p>
        </div>
        <div class="">
          <h5>Endereço</h5>
          <p class="ml-3">{{$client->street}} {{$client->street_number}}<br>{{$client->city->name}}, {{$client->city->state_id}}</p>
        </div>
        <div class="">
          <h5>Contato</h5>
          <p class="ml-3">{{$client->user->name}}<br>{{Helper::mask($client->user->phone,'(**) ****-****')}}<br>{{$client->user->email}}</p>
        </div>
        <div class="row mx-0 mt-5">
          <div class="mx-auto">
            @if (!$client->actived)
              <form class="d-inline-block" action="{{env('APP_URL')."/public/client/".$client->id.'/active'}}" method="post">
                {{ csrf_field() }}
                <input type="hidden" name="_method" value="PUT">
                <input type="submit" class="btn btn-confirm mx-3" value="Ativar"></input>
              </form>
            @else
              <form class="d-inline-block" action="{{env('APP_URL')."/public/client/".$client->id.'/disable'}}" method="post">
                {{ csrf_field() }}
                <input type="hidden" name="_method" value="PUT">
                <input type="submit" class="btn btn-confirm mx-3" value="Desativar"></input>
              </form>
            @endif
            <a class="btn btn-confirm mx-3" href="{{env('APP_URL').'/public/client/'.$client->id.'/edit'}}" name="button">Editar</a>
          </div>
        </div>
      </div>
      <div class="col-sm-6">
        <div id="map" class="map">

        </div>
      </div>
      @if ($client->video_link)
        <h2 class="col-sm-12 mt-4 text-center">Video:</h2>
        <div class="mx-auto mt-2 col-sm-6 video-container">
          <iframe src="{{$client->video_link}}">
          </iframe>
        </div>
      @endif
    </div>
  </div>

  <script type="text/javascript">
  var myMap = function() {
      var client = {
        lat : {{$client->lat}},
        lng : {{$client->lng}}
      };
      console.log(client);
      var myCenter= new google.maps.LatLng(client.lat, client.lng);
      var mapOptions = {
          center: myCenter,
          zoom: 14,
          mapTypeId: google.maps.MapTypeId.ROADMAP
      }
      var map = new google.maps.Map(document.getElementById("map"), mapOptions);
      var marker = new google.maps.Marker({
        position: myCenter,
        animation: google.maps.Animation.BOUNCE,
      });
      marker.setMap(map);
  }
</script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDZq8KvogyaNl9_upUQBUBPw_Ltfic4Fcw&callback=myMap"></script>
@endsection
