@extends('layout.base')

@section('top')
  <div class="container-fluid">
    <div class="row m-0">
      <div class="col-sm-2 pt-2 px-0">
        <a href="{{env('APP_URL').'/admin/home'}}"><img src="{{  env('APP_URL').('/public/img/acheja.png')}}" class="p-relative horizontal-center " style="width:100%;" alt=""></a>
      </div>
      <div class="col-sm-7 pt-2 ">
        <h3 class="p-relative horizontal-center float-sm-right text-center menu-name smooth-border" style="width:90%;">Gestão de conteudo</h3>
      </div>
      <div class="col-sm-3">
        @include('layout.user')
      </div>
  </div>
  <hr class="mt-2 mb-4">
@endsection

@section('content')
@include('layout.success')


<!-- Modal Category -->
<div class="modal fade" id="modalCategory" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Adicionar categoria</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form class="" action="{{env('APP_URL').'/admin/categories'}}" method="post">
        {{ csrf_field() }}
        <div class="modal-body">
          <div class="form-group">
            <label for="name">Nome</label>
            <input required type="text" class="form-control" id="name" name="name" value="">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
          <input type="submit" class="btn btn-confirm" value="Adicionar">
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal Remove Category -->
<div class="modal fade" id="modalRemoveCategory" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Remover categoria</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form class="" action="{{env('APP_URL').'/admin/category/'.request()->category}}" method="post">
        {{ csrf_field() }}
        <input type="hidden" name="_method" value="DELETE">
        <div class="modal-body">
          <h6>Tem certeza que deseja remover está categoria?</h6>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Não</button>
          <input type="submit" class="btn btn-confirm" value="Sim">
        </div>
      </form>
    </div>
  </div>
</div>


<!-- Modal Category -->
<div class="modal fade" id="modalRegion" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Adicionar Região</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form class="" action="{{env('APP_URL').'/admin/regions'}}" method="post">
        {{ csrf_field() }}
        <div class="modal-body">
          <div class="form-group">
            <label for="name">Nome</label>
            <input required type="text" class="form-control" id="name" name="name" value="">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
          <input type="submit" class="btn btn-confirm" value="Adicionar">
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal Remove region -->
<div class="modal fade" id="modalRemoveRegion" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Remover região</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form class="" action="{{env('APP_URL').'/admin/region/'.request()->region}}" method="post">
        {{ csrf_field() }}
        <input type="hidden" name="_method" value="DELETE">
        <div class="modal-body">
          <h6>Tem certeza que deseja remover está região?</h6>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Não</button>
          <input type="submit" class="btn btn-confirm" value="Sim">
        </div>
      </form>
    </div>
  </div>
</div>


<!-- Modal Remove City -->
<div class="modal fade" id="modalRemoveCity" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Remover cidade</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form class="" action="{{env('APP_URL').'/admin/city/'.request()->city}}" method="post">
        {{ csrf_field() }}
        <input type="hidden" name="_method" value="DELETE">
        <input type="hidden" name="id" value="">
        <div class="modal-body">
          <h6>Tem certeza que deseja remover está cidade?</h6>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Não</button>
          <input type="submit" class="btn btn-confirm" value="Sim">
        </div>
      </form>
    </div>
  </div>
</div>



@include('layout.errors')

  <div class="myContainer flexDislpayCenter-h row">
    <div class="col-sm-3">
      <div class="">
        <p data-toggle="modal" data-target="#modalCategory"><i style="color:#00aede" class="fa fa-plus-circle d-inline" style="margin:auto; width:.8em;" aria-hidden="true"></i> Adicionar categoria</p>
        @if (request()->category)
          <p data-toggle="modal" data-target="#modalRemoveCategory"><i style="color:rgb(239, 115, 115)" class="fa fa-times-circle d-inline" style="margin:auto; width:.8em;" aria-hidden="true"></i> Remover categoria</p>
        @endif
      </div>
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
      </div>
    </div>
    @foreach ($states as $state)

      <!-- Modal City -->
      <div class="modal fade" id="modal{{$state->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Adicionar cidade a {{$state->name}}</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form class="" action="{{env('APP_URL').'/admin/cities'}}" method="post">
              {{ csrf_field() }}
              <input type="hidden" name="state_id" value="{{$state->id}}">
              <div class="modal-body">
                <div class="form-group">
                  <label for="name">Nome</label>
                  <input required type="text" class="form-control" id="name" name="name" value="">
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                <input type="submit" class="btn btn-confirm" value="Adicionar">
              </div>
            </form>
          </div>
        </div>
      </div>

      <div class="col-sm-3">
        <div class="">
          <p data-toggle="modal" data-target="#modal{{$state->id}}"><i style="color:#00aede" class="fa fa-plus-circle d-inline" style="margin:auto; width:.8em;" aria-hidden="true"></i> Adicionar cidade</p>
          @if (request()->city)
            <p data-toggle="modal" data-target="#modalRemoveCity"><i style="color:rgb(239, 115, 115)" class="fa fa-times-circle d-inline" style="margin:auto; width:.8em;" aria-hidden="true"></i> Remover cidade</p>
          @endif
        </div>
        <div class="list-group">
          <h4 class="list-group-item">{{$state->name}}</h4>
          @foreach ($state->cities as $city)
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
        </div>
      </div>
    @endforeach
    <div class="col-sm-3">
      <div class="">
        <p data-toggle="modal" data-target="#modalRegion"><i style="color:#00aede" class="fa fa-plus-circle d-inline" style="margin:auto; width:.8em;" aria-hidden="true"></i> Adicionar cidade</p>
        @if (request()->region)
          <p data-toggle="modal" data-target="#modalRemoveRegion"><i style="color:rgb(239, 115, 115)" class="fa fa-times-circle d-inline" style="margin:auto; width:.8em;" aria-hidden="true"></i> Remover cidade</p>
        @endif
      </div>
      <div class="list-group" style="">
        <h4 class="list-group-item">Região</h4>
        @foreach ($regions as $region)
          <a onclick={{"goToRegion(".$region->id.")"}} class="<?php
          if(intval(request()->region)==$region->id){
            //dd(intval(request()->category));
            echo "list-group-item active";
          }
          else {
            echo "list-group-item";
          }
          ?>" >{{$region->name}}</a>
        @endforeach
      </div>
    </div>
  </div>
  <script src="{{  env('APP_URL')('public/js/Filter.js')}}" type="text/javascript"></script>
@endsection
