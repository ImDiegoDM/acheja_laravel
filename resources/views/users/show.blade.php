@extends('layout.base')

@section('top')
  <div class="container-fluid">
    <div class="row m-0">
      <div class="col-sm-2 pt-2 px-0">
        <a href="{{env('APP_URL').'/public/home'}}"><img src="{{ URL::asset('img/acheja.png')}}" class="p-relative horizontal-center " style="width:100%;" alt=""></a>
      </div>
      <div class="col-sm-7 pt-2 ">
        <h4 class="p-relative horizontal-center float-sm-right text-center menu-name smooth-border" style="width:90%;">Usuario</h4>
      </div>
      <div class="col-sm-3">
        @include('layout.user')
      </div>
    </div>
  <hr class="mt-2 mb-2">
  </div>
@stop

@section('content')
  <div class="myContainer px-2">
    <h3 class=" mb-3">Informações pessoais</h3>
    <div class="leftBorder px-2">
      <h4>{{$user->name}}</h4>
      <p class="ml-4 mb-1">E-mail: <span class="userInfo">{{$user->email}}</span></p>
      <p class="ml-4 mb-1">Telefone: <span class="userInfo">{{Helper::mask($user->phone,'(**) ****-****')}}</span></p>
      <p class="ml-4 mb-1">Tipo: <span class="userInfo">{{$user->user_type->name}}</span></p>
      <p class="ml-4 mb-1">Possuiu acesso: <span class="userInfo">@if($user->have_acess)<span>sim</span> @else <span >não</span>@endif</span></p>
      <p class="ml-4 mb-1">Email confirmado: <span class="userInfo">@if($user->confirm_email)<span>sim</span> @else <span>não</span>@endif</span></p>
      <p class="ml-4 mb-1">Criado em: <span class="userInfo">{{$user->created_at->setTimezone('-4')->format('d/m/Y')}}</span></p>
    </div>
    <h3 class="my-3"> Clientes que este usuario possui</h3>
    <div class="leftBorder px-4">
      @foreach ($user->clients as $client)
        <a href="{{env('APP_URL')}}/public/client/{{$client->id}}">
        @include('layout.client')
        </a>
      @endforeach
    </div>
  </div>
@endsection
