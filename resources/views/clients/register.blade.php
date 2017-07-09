@extends('layout.base')

@section('top')
  <div class="container-fluid">
    <div class="row m-0">
      <div class="col-sm-2 pt-2 px-0">
        <a href="{{env('APP_URL').'/admin/home'}}"><img src="{{  env('APP_URL').('/public/img/acheja.png')}}" class="p-relative horizontal-center " style="width:100%;" alt=""></a>
      </div>
      <div class="col-sm-7 pt-2 ">
        <h3 class="p-relative horizontal-center float-sm-right text-center menu-name smooth-border" style="width:90%;">Adicionar Cliente</h3>
      </div>
      <div class="col-sm-3">
        @include('layout.user')
      </div>
  </div>
  <hr class="mt-2 mb-4">
@endsection

@section('content')
  <!--<script type="text/javascript" src="{{  env('APP_URL').('/public/js/ClientsStoreFiles.js')}}" ></script>-->
  <script type="text/javascript" src="{{  env('APP_URL').('/public/js/FilePreview.js')}}" ></script>
  <script type="text/javascript" src="{{  env('APP_URL').('/public/js/Photo1.js')}}" ></script>
  <script type="text/javascript" src="{{  env('APP_URL').('/public/js/Photo2.js')}}" ></script>
  <script type="text/javascript" src="{{  env('APP_URL').('/public/js/Photo3.js')}}" ></script>
  <script type="text/javascript" src="{{  env('APP_URL').('/public/js/Photo4.js')}}" ></script>
  <div class="myContainer">
      <form class="" action="{{  env('APP_URL').('/public/admin/clients')}}" enctype="multipart/form-data" method="post">
        {{ csrf_field() }}
        @include('layout.errors')
        <div class="form-group row py-2" style="background-color:#0373a0; color:white;">
          <div class="col-sm-8 mr-0 row">
            <h3 class="ml-2 col-sm-12">Cadastro de clientes</h3>
            <div class="col-sm-12 ">
              <label class="col-sm-6 text-right " style="top:5%" for="exampleSelect1">*Cidade</label>
              <select class="form-control col-sm-6 d-inline-block float-sm-right" value="{{old('city_id')}}" id="city_id" name="city_id">
                @foreach ($cities as $city)
                  <option value="{{$city->id}}">{{$city->name}}</option>
                @endforeach
              </select>

            </div>
            <div class="col-sm-12">
              @if (count($users)>0)
                <label class="col-sm-6 text-right " style="top:5%" for="exampleSelect1">*Responsavel</label>
                <select class="form-control d-inline-block float-sm-right col-sm-6" value="{{old('user_id')}}" id="user_id" name="user_id">
                  @foreach ($users as $user)
                    <option value="{{$user->id}}">{{$user->name}}</option>
                  @endforeach
                </select>
              @endif
            </div>
          </div>
          <div class="col-sm-4" >
            <div class=" p-0 d-inline-block file-btn mr-md-5 float-sm-right px-1" style="border-radius:10px;" id="logoBox">
              <label for="logo" id="labelLogo" class="labe-preview"></label>
              <img id="logoPreview" class="file-preview" src="" alt="">
              <label for="logo" id="logoButton" class="btn btn-primary col-sm-12" style="top:36%; font-size:16px;" name="button">Adicionar Logo</label>
              <input type="file" onchange="logoPreviewFile()" class="d-none" name="logo" id="logo" value="">
            </div>
          </div>
          @if (count($users)<=0)
            <div class="col-sm-10 mx-auto alert alert-warning">
              <i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Nenhum <a href="{{ env('APP_URL').('/public/admin/users/register')}}">usuario</a> cadastrado no sistemo por favor cadestre um usuario.
            </div>
          @endif
        </div>
        <div class="form-group row mx-0">
          <label class=" col-sm-2 d-inline-block pt-1" for="">*Cliente:</label>
          <input type="text" style=""  class="col-sm-10 form-control" placeholder="Digite o nome do cliente" value="{{old('name')}}" id="name" name="name">
        </div>
        <div class="form-group row mx-0">
          <label class="col-sm-2 pt-1" for="">*Endereço:</label>
          <input type="text" style=""  class="col-sm-6 form-control" value="{{old('street')}}" id="street" name="street" placeholder="Exp: Rua Presbitero João Rosa">
          <label class="col-sm-2 pt-1" for="">*Numero:</label>
          <input type="text" style=""  class="col-sm-2 form-control" value="{{old('street_number')}}" id="street_number" name="street_number" placeholder="Exp: 253">
        </div>
        <div class="form-group row mx-0">
          <label class="col-sm-2 pt-1" for="">*Categoria:</label>
          <select class="form-control col-sm-4" value="{{old('category_id')}}" id="category_id" name="category_id">
            @foreach ($categories as $category)
              <option value="{{$category->id}}">{{$category->name}}</option>
            @endforeach
          </select>
          @if (count($regions)>0)
            <label class="col-sm-2 pt-1" for="">Região:</label>
            <select class="form-control col-sm-4" value="{{old('region_id')}}" id="region_id" name="region_id">
              @foreach ($regions as $region)
                <option value="{{$region->id}}">{{$region->name}}</option>
              @endforeach
            </select>
          @endif
        </div>
        <div class="form-group row mx-0">
          <label class="col-sm-2 pt-1" for="">Telefone:</label>
          <input type="text" style="" class="col-sm-4 form-control" value="{{old('phone')}}" id="phone" name="phone" placeholder="Exp: (31) 1234-1234">
          <label class="col-sm-2 pt-1" for="">Site:</label>
          <input type="text" style="" class="col-sm-4 form-control" value="{{old('website')}}" id="website" name="website" placeholder="Exp: www.fulano.com.br">
        </div>
        <div class="form-group row mx-0">
          <label class="col-sm-2 pt-1" for="video_link">Video URL:</label>
          <input type="text" style="" class="col-sm-10 form-control" value="{{old('video_link')}}" id="video_link" name="video_link" placeholder="https://www.youtube.com/watch?v=JGwWNGJdvx8">
        </div>
        <div class="form-group row mx-0">
          <label class="col-sm-2 pt-1"  for="exampleTextarea">*Descrição:</label>
          <textarea class=" col-sm-10 form-control" id="description" style="resize: none;" name="description" rows="3">{{{old('description')}}}</textarea>
        </div>
        <div class="form-group row mx-0">
          <label class="col-sm-2 pt-1" for="exampleTextarea">Imagens:</label>
          <div class="col-sm-10 row mx-0">
            <div class="col-sm-3" style="padding-bottom:20px;" id="photo1Box">
              <label for="photo1" id="labelphoto1" class="labelP-preview"></label>
              <img id="photo1Preview" class="photo-preview" src="" alt="">
              <label for="photo1" id="photo1Button" class="btn btn-primary col-sm-12" style="top:36%; font-size:16px;" name="button">Imagem 1</label>
              <input type="file" onchange="photo1PreviewFile()" class="d-none" name="photo1" id="photo1" value="">
            </div>
            <div class="col-sm-3" style="padding-bottom:20px;" id="photo2Box">
              <label for="photo2" id="labelphoto2" class="labelP-preview"></label>
              <img id="photo2Preview" class="photo-preview" src="" alt="">
              <label for="photo2" id="photo2Button" class="btn btn-primary col-sm-12" style="top:36%; font-size:16px;" name="button">Imagem 2</label>
              <input type="file" onchange="photo2PreviewFile()" class="d-none" name="photo2" id="photo2" value="">
            </div>
            <div class="col-sm-3" style="padding-bottom:20px;" id="photo3Box">
              <label for="photo3" id="labelphoto3" class="labelP-preview"></label>
              <img id="photo3Preview" class="photo-preview" src="" alt="">
              <label for="photo3" id="photo3Button" class="btn btn-primary col-sm-12" style="top:36%; font-size:16px;" name="button">Imagem 3</label>
              <input type="file" onchange="photo3PreviewFile()" class="d-none" name="photo3" id="photo3" value="">
            </div>
            <div class="col-sm-3" style="padding-bottom:20px;" id="photo4Box">
              <label for="photo4" id="labelphoto4" class="labelP-preview"></label>
              <img id="photo4Preview" class="photo-preview" src="" alt="">
              <label for="photo4" id="photo4Button" class="btn btn-primary col-sm-12" style="top:36%; font-size:16px;" name="button">Imagem 4</label>
              <input type="file" onchange="photo4PreviewFile()" class="d-none" name="photo4" id="photo4" value="">
            </div>
          </div>
        </div>
        <div class="form-group row mx-0 py-3" style="padding: 1px 15px;">
          <label class="form-check-label">
            <input type="checkbox" value="1" @if(old('actived')==1) checked @endif name="actived" class="form-check-input">
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
