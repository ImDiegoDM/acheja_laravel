@extends('layout.base')

@section('top')
  <div class="container-fluid">
    <div class="row m-0">
      <div class="col-sm-2 pt-2 px-0">
        <a href="{{env('APP_URL').'/public/home'}}"><img src="{{ URL::asset('img/acheja.png')}}" class="p-relative horizontal-center " style="width:100%;" alt=""></a>
      </div>
      <div class="col-sm-7 pt-2 ">
        <h3 class="p-relative horizontal-center float-sm-right text-center menu-name smooth-border" style="width:90%;">Editar Cliente</h3>
      </div>
      <div class="col-sm-3">
        @include('layout.user')
      </div>
  </div>
  <hr class="mt-2 mb-4">
@endsection

@section('content')
  <!--<script type="text/javascript" src="{{ URL::asset('js/ClientsStoreFiles.js')}}" ></script>-->
  <script type="text/javascript" src="{{ URL::asset('js/FilePreview.js')}}" ></script>
  <script type="text/javascript" src="{{ URL::asset('js/Photo1.js')}}" ></script>
  <script type="text/javascript" src="{{ URL::asset('js/Photo2.js')}}" ></script>
  <script type="text/javascript" src="{{ URL::asset('js/Photo3.js')}}" ></script>
  <script type="text/javascript" src="{{ URL::asset('js/Photo4.js')}}" ></script>
  <div class="myContainer">
      <form class="" action="{{env('APP_URL')."/public/client/".$client->id}}" enctype="multipart/form-data" method="post">
        <input type="hidden" name="_method" value="PUT">
        {{ csrf_field() }}
        @include('layout.errors')
        <div class="form-group row py-2" style="background-color:#0373a0; color:white;">
          <div class="col-sm-8 mr-0 row">
            <h3 class="ml-2 col-sm-12">Cadastro de clientes</h3>
            <div class="col-sm-12 ">
              <label class="col-sm-6 text-right " style="top:5%" for="exampleSelect1">*Cidade</label>
              <select class="form-control col-sm-6 d-inline-block float-sm-right" value="{{$client->city_id}}" id="city_id" name="city_id">
                @foreach ($cities as $city)
                  <option value="{{$city->id}}">{{$city->name}}</option>
                @endforeach
              </select>

            </div>
            <div class="col-sm-12">
              @if (count($users)>0)
                <label class="col-sm-6 text-right " style="top:5%" for="exampleSelect1">*Responsavel</label>
                <select class="form-control d-inline-block float-sm-right col-sm-6" value="{{$client->user_id}}" id="user_id" name="user_id">
                  @foreach ($users as $user)
                    <option value="{{$user->id}}">{{$user->name}}</option>
                  @endforeach
                </select>
              @endif
            </div>
          </div>
          <div class="col-sm-4" >
            <div class=" p-0 d-inline-block file-btn mr-md-5 float-sm-right px-1" style="border-radius:10px;" id="logoBox">
              @if ($client->logo_url)
                <label for="logo" id="labelLogo" style="display:block;" class="labe-preview"></label>
                <img id="logoPreview" class="file-preview" style="display:block;" src="{{env('APP_URL') . '/storage/app/' . $client->logo_url}}" alt="">
                <label for="logo" id="logoButton" style="display:none;" class="btn btn-primary col-sm-12" style="top:36%; font-size:16px;" name="button">Adicionar Logo</label>
                <input type="file" onchange="logoPreviewFile()" class="d-none" name="logo" id="logo" value="">
              @else
                <label for="logo" id="labelLogo" class="labe-preview"></label>
                <img id="logoPreview" class="file-preview" src="" alt="">
                <label for="logo" id="logoButton" class="btn btn-primary col-sm-12" style="top:36%; font-size:16px;" name="button">Adicionar Logo</label>
                <input type="file" onchange="logoPreviewFile()" class="d-none" name="logo" id="logo" value="">
              @endif
            </div>
          </div>
          @if (count($users)<=0)
            <div class="col-sm-10 mx-auto alert alert-warning">
              <i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Nenhum <a href="{{URL::asset('users/register')}}">usuario</a> cadastrado no sistemo por favor cadestre um usuario.
            </div>
          @endif
        </div>
        <div class="form-group row mx-0">
          <label class=" col-sm-2 d-inline-block pt-1" for="">*Cliente:</label>
          <input type="text" style=""  class="col-sm-10 form-control" placeholder="Digite o nome do cliente" value="{{$client->name}}" id="name" name="name">
        </div>
        <div class="form-group row mx-0">
          <label class="col-sm-2 pt-1" for="">*Endereço:</label>
          <input type="text" style=""  class="col-sm-6 form-control" value="{{$client->street}}" id="street" name="street" placeholder="Exp: Rua Presbitero João Rosa">
          <label class="col-sm-2 pt-1" for="">*Numero:</label>
          <input type="text" style=""  class="col-sm-2 form-control" value="{{$client->street_number}}" id="street_number" name="street_number" placeholder="Exp: 253">
        </div>
        <div class="form-group row mx-0">
          <label class="col-sm-2 pt-1" for="">*Categoria:</label>
          <select class="form-control col-sm-4" value="{{$client->category_id}}" id="category_id" name="category_id">
            @foreach ($categories as $category)
              <option value="{{$category->id}}">{{$category->name}}</option>
            @endforeach
          </select>
          @if (count($regions)>0)
            <label class="col-sm-2 pt-1" for="">Região:</label>
            <select class="form-control col-sm-4" value="{{$client->region_id}}" id="region_id" name="region_id">
              @foreach ($regions as $region)
                <option value="{{$region->id}}">{{$region->name}}</option>
              @endforeach
            </select>
          @endif
        </div>
        <div class="form-group row mx-0">
          <label class="col-sm-2 pt-1" for="">Telefone:</label>
          <input type="text" style="" class="col-sm-4 form-control" value="{{$client->phone}}" id="phone" name="phone" placeholder="Exp: (31) 1234-1234">
          <label class="col-sm-2 pt-1" for="">Site:</label>
          <input type="text" style="" class="col-sm-4 form-control" value="{{$client->website}}" id="website" name="website" placeholder="Exp: www.fulano.com.br">
        </div>
        <div class="form-group row mx-0">
          <label class="col-sm-2 pt-1" for="video_link">Video URL:</label>
          <input type="text" style="" class="col-sm-10 form-control" value="{{$client->video_link}}" id="video_link" name="video_link" placeholder="https://www.youtube.com/watch?v=JGwWNGJdvx8">
        </div>
        <div class="form-group row mx-0">
          <label class="col-sm-2 pt-1"  for="exampleTextarea">*Descrição:</label>
          <textarea class=" col-sm-10 form-control" id="description" style="resize: none;" name="description" rows="3">{{$client->description}}</textarea>
        </div>
        <div class="form-group row mx-0">
          <label class="col-sm-2 pt-1" for="exampleTextarea">Imagens:</label>
          <div class="col-sm-10 row mx-0">
            <div class="col-sm-3" style="padding-bottom:20px;" id="photo1Box">
              @if ($client->photo_1)
                <label for="photo1" id="labelphoto1" style="display:block;" class="labelP-preview"></label>
                <img id="photo1Preview" style="display:block;" class="photo-preview" src="{{env('APP_URL') . '/storage/app/' . $client->photo_1}}" alt="">
                <label for="photo1" style="display:none;" id="photo1Button" class="btn btn-primary col-sm-12" style="top:36%; font-size:16px;" name="button">Imagem 1</label>
                <input type="file" onchange="photo1PreviewFile()" class="d-none" name="photo1" id="photo1" value="">
              @else
                <label for="photo1" id="labelphoto1" class="labelP-preview"></label>
                <img id="photo1Preview" class="photo-preview" src="" alt="">
                <label for="photo1" id="photo1Button" class="btn btn-primary col-sm-12" style="top:36%; font-size:16px;" name="button">Imagem 1</label>
                <input type="file" onchange="photo1PreviewFile()" class="d-none" name="photo1" id="photo1" value="">
              @endif
            </div>
            <div class="col-sm-3" style="padding-bottom:20px;" id="photo2Box">
              @if ($client->photo_2)
                <label for="photo2" style="display:block;" id="labelphoto2" class="labelP-preview"></label>
                <img id="photo2Preview" style="display:block;" class="photo-preview" src="{{env('APP_URL') . '/storage/app/' . $client->photo_2}}" alt="">
                <label for="photo2" style="display:none;" id="photo2Button" class="btn btn-primary col-sm-12" style="top:36%; font-size:16px;" name="button">Imagem 2</label>
                <input type="file" onchange="photo2PreviewFile()" class="d-none" name="photo2" id="photo2" value="">
              @else
                <label for="photo2" id="labelphoto2" class="labelP-preview"></label>
                <img id="photo2Preview" class="photo-preview" src="" alt="">
                <label for="photo2" id="photo2Button" class="btn btn-primary col-sm-12" style="top:36%; font-size:16px;" name="button">Imagem 2</label>
                <input type="file" onchange="photo2PreviewFile()" class="d-none" name="photo2" id="photo2" value="">
              @endif
            </div>
            <div class="col-sm-3" style="padding-bottom:20px;" id="photo3Box">
              @if ($client->photo_3)
                <label for="photo3" style="display:block" id="labelphoto3" class="labelP-preview"></label>
                <img id="photo3Preview" style="display:block" class="photo-preview" src="{{env('APP_URL') . '/storage/app/' . $client->photo_3}}" alt="">
                <label for="photo3" style="display:none;" id="photo3Button" class="btn btn-primary col-sm-12" style="top:36%; font-size:16px;" name="button">Imagem 3</label>
                <input type="file" onchange="photo3PreviewFile()" class="d-none" name="photo3" id="photo3" value="">
              @else
                <label for="photo3" id="labelphoto3" class="labelP-preview"></label>
                <img id="photo3Preview" class="photo-preview" src="" alt="">
                <label for="photo3" id="photo3Button" class="btn btn-primary col-sm-12" style="top:36%; font-size:16px;" name="button">Imagem 3</label>
                <input type="file" onchange="photo3PreviewFile()" class="d-none" name="photo3" id="photo3" value="">
              @endif
            </div>
            <div class="col-sm-3" style="padding-bottom:20px;" id="photo4Box">
              @if ($client->photo_4)
                <label for="photo4" style="display:block;" id="labelphoto4" class="labelP-preview"></label>
                <img id="photo4Preview" style="display:block;" class="photo-preview" src="{{env('APP_URL') . '/storage/app/' . $client->photo_4}}" alt="">
                <label for="photo4" style="display:none;" id="photo4Button" class="btn btn-primary col-sm-12" style="top:36%; font-size:16px;" name="button">Imagem 4</label>
                <input type="file" onchange="photo4PreviewFile()" class="d-none" name="photo4" id="photo4" value="">
              @else
                <label for="photo4" id="labelphoto4" class="labelP-preview"></label>
                <img id="photo4Preview" class="photo-preview" src="" alt="">
                <label for="photo4" id="photo4Button" class="btn btn-primary col-sm-12" style="top:36%; font-size:16px;" name="button">Imagem 4</label>
                <input type="file" onchange="photo4PreviewFile()" class="d-none" name="photo4" id="photo4" value="">
              @endif
            </div>
          </div>
        </div>
        <div class="form-group row mx-0 py-3" style="padding: 1px 15px;">
          <label class="form-check-label">
            <input type="checkbox" value="1" @if($client->actived==1) checked @endif name="actived" class="form-check-input">
            Cliente ativo
          </label>
        </div>
        <div class="form-group row mx-0">
          <div class="col-sm-4" style="margin:auto;">
            <input type="submit" class="btn btn-confirm" name="button" value="Publicar"></input>
            <a class="btn btn-back float-sm-right" href="" onclick="goBack()" name="button">Voltar</a>
          </div>
        </div>
      </form>
  </div>
@endsection
