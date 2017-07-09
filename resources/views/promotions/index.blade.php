@php
  use Carbon\Carbon;
@endphp

@extends('layout.base')

@section('top')
  <div class="container-fluid">
    <div class="row m-0">
      <div class="col-sm-2 pt-2 px-0">
        <a href="{{env('APP_URL').'/admin/home'}}"><img src="{{  env('APP_URL').('/public/img/acheja.png')}}" class="p-relative horizontal-center " style="width:100%;" alt=""></a>
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
  @include('layout.success')
  @include('layout.errors-modal')
  <!-- Modal create -->
  <div class="modal fade" id="modalCreate" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Criar Promoção</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form class="" action="{{env('APP_URL').'/admin/promotions/'.$client->id}}" method="post">
          {{ csrf_field() }}
          <div class="modal-body">
            <div class="form-group">
              <label for="title">Titulo</label>
              <input required type="text" class="form-control" id="title" name="title" value="">
            </div>
            <label for="description">Descrição</label>
            <textarea rows="4" class="form-control not-resizeble" required style="resize: none;" id="description" name="description"></textarea>
            <div class="row">
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="begin">Começa em (opcional)</label>
                  <input type="dateTime" class="form-control date" id="begin" name="begin" value="">
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="end">Termina em (opcional)</label>
                  <input type="dateTime" class="form-control date" id="end" name="end" value="">
                </div>
              </div>
            </div>
            <script type="text/javascript">
              $(document).ready(function() {
                $('.date').mask("00/00/0000", {placeholder: "__/__/____"});
              });
            </script>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
            <input type="submit" class="btn btn-confirm" value="Adicionar">
          </div>
        </form>
      </div>
    </div>
  </div>


  <div class="myContainer">
    @include('layout.client')
    <div class="row mx-0 mt-3">
      <div class="">
        <button class="btn btn-confirm mx-2 mb-2" data-toggle="modal" data-target="#modalCreate" name="button">Criar Promoção</button>
      </div>
    </div>
    <hr>
    @if (count($promotions)<=0)
      <div class="row">
        <p class="mx-auto">Nem uma promoção cadastrada ainda.</p>
      </div>
      @else
        @foreach ($promotions as $promotion)

          <!-- Modal Remove -->
          <div class="modal fade" id="modalRemove{{$promotion->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Remover Promoção</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <form class="" action="{{env('APP_URL').'/admin/promotion/'.$promotion->id}}" method="post">
                  {{ csrf_field() }}
                  <input type="hidden" name="_method" value="DELETE">
                  <div class="modal-body">
                    <h6>Tem certeza que deseja remover está promoção?</h6>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Não</button>
                    <input type="submit" class="btn btn-confirm" value="Sim">
                  </div>
                </form>
              </div>
            </div>
          </div>

          <div class="modal fade" id="modalEdit{{$promotion->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Editar Promoção</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <form class="" action="{{env('APP_URL').'/admin/promotion/'.$promotion->id}}" method="post">
                  {{ csrf_field() }}
                  <input type="hidden" name="_method" value="PUT">
                  <div class="modal-body">
                    <div class="form-group">
                      <label for="title">Titulo</label>
                      <input required type="text" class="form-control" id="title" name="title" value="{{$promotion->title}}">
                    </div>
                    <label for="description">Descrição</label>
                    <textarea rows="4" class="form-control not-resizeble" required style="resize: none;" id="description" name="description">{{$promotion->description}}</textarea>
                    <div class="row">
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label for="begin">Começa em (opcional)</label>
                          @if($promotion->begin)
                          <input type="dateTime" class="form-control date" id="begin" name="begin" value="{{$promotion->begin->setTimezone('-4')->format('d/m/Y')}}">
                          @else
                            <input type="dateTime" class="form-control date" id="begin" name="begin" value="">
                          @endif
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label for="end">Termina em (opcional)</label>
                          @if($promotion->end)
                          <input type="dateTime" class="form-control date" id="end" name="end" value="{{$promotion->end->setTimezone('-4')->format('d/m/Y')}}">
                          @else
                            <input type="dateTime" class="form-control date" id="end" name="end" value="">
                          @endif
                        </div>
                      </div>
                    </div>
                    <script type="text/javascript">
                      $(document).ready(function() {
                        $('.date').mask("00/00/0000", {placeholder: "__/__/____"});
                      });
                    </script>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                    <input type="submit" class="btn btn-confirm" value="Adicionar">
                  </div>
                </form>
              </div>
            </div>
          </div>


          <div class="row">
            <div class="col-sm-9 mx-auto my-2 promotion">
              <h3 class="mt-2">{{$promotion->title}}</h3>
              <p class="ml-3">{{$promotion->description}}</p>
              @if ($promotion->begin&&$promotion->end)
                <p class="ml-3 mb-1" style="font-size:13px;">Começa em:{{$promotion->begin->setTimezone('-4')->format('d/m/Y')}} Termina em:{{$promotion->end->setTimezone('-4')->format('d/m/Y')}}</p>
              @elseif ($promotion->begin)
                <p class="ml-3 mb-1" style="font-size:13px;">Começa em:{{$promotion->begin->setTimezone('-4')->format('d/m/Y')}}</p>
              @elseif ($promotion->end)
                <p class="ml-3 mb-1" style="font-size:13px;">Termina em:{{$promotion->end->setTimezone('-4')->format('d/m/Y')}}</p>
              @endif
              <div class="abs-right">
                <a data-toggle="modal" data-target="#modalEdit{{$promotion->id}}" class="btn-promotion d-block mx-2" ><i class="fa fa-pencil" aria-hidden="true"></i> Editar</a>
                <a data-toggle="modal" data-target="#modalRemove{{$promotion->id}}" class="btn-promotion d-block mx-2" ><i class="fa fa-times" style="color:rgb(239, 115, 115)" aria-hidden="true"></i> Deletar</a>
              </div>
            </div>
          </div>
        @endforeach
    @endif
  </div>
@endsection
