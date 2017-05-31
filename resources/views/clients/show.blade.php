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
    <div class="row py-3" style="background-color:#0373a0; color:white;">
      <div class="col-sm-6">
        <h1 class="mb-0">{{$client->name}}</h1>
        <h4 class="ml-4">{{$client->category->name}}</h4>
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
          <img src="{{env('APP_URL') . '/storage/app/' . $client->photo_1}}" class="imgShow" alt="">
        </a>
      </div>
      <div class="col-sm-3 imgBox">
        <a href="">
          <img src="{{env('APP_URL') . '/storage/app/' . $client->photo_2}}" class="imgShow" alt="">
        </a>
      </div>
      <div class="col-sm-3 imgBox">
        <a href="">
          <img src="{{env('APP_URL') . '/storage/app/' . $client->photo_3}}" class="imgShow" alt="">
        </a>
      </div>
      <div class="col-sm-3 imgBox">
        <a href="">
          <img src="{{env('APP_URL') . '/storage/app/' . $client->photo_4}}" class="imgShow" alt="">
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
          <p class="ml-3">{{$client->user->name}}<br>{{$client->user->phone}}<br>{{$client->user->email}}</p>
        </div>
      </div>
      <div class="col-sm-6">
        <div id="map" class="map">

        </div>
      </div>
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
