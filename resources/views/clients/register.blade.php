@extends('layout.base')

@section('top')
  <div class="container-fluid">
    <div class="row m-0">
      <div class="col-sm-8 py-3 px-0">
        <h1 class="text-center menu-name smooth-border" style="max-width:90%;">Adicionar cliente</h1>
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
  <script type="text/javascript" src="{{ URL::asset('js/ClientsStoreFiles.js')}}" ></script>
  <div class="myContainer">
      <form class="" action="index.html" method="post">
        {{ csrf_field() }}
        <div class="form-group row py-2" style="background-color:#00887a; color:white;">
          <div id="template" class="">
            <div>
              <span class="preview"><img data-dz-thumbnail /></span>
            </div>
          </div>
          <div class="col-sm-8 mr-0 row">
            <h3 class="ml-2 col-sm-12">Cadastro de clientes</h3>
            <label class="col-sm-3 text-center " style="top:5%" for="exampleSelect1">Cidade</label>
            <select class="form-control col-sm-9" id="city_id" name="city_id">
              @foreach ($cities as $city)
                <option value="{{$city->id}}">{{$city->name}}</option>
              @endforeach
            </select>
          </div>
          <div class="col-sm-4" >
            <div class=" p-0 d-inline-block file-btn mr-md-5 float-sm-right" id="my-awesome-dropzone">
              <button type="button" id="fileinput-button" class="btn btn-primary col-sm-12" style="top:30%; font-size:16px;" name="button">Adicionar Logo</button>
            </div>
          </div>
        </div>
        <div class="form-group row mx-0">
          <label class=" col-sm-2 d-inline-block pt-1" for="">Cliente:</label>
          <input type="text" style="" class="col-sm-10 form-control" placeholder="Digite o nome do cliente" id="name" name="name">
        </div>
        <div class="form-group row mx-0">
          <label class="col-sm-2 pt-1" for="">Endereço:</label>
          <input type="text" style="" class="col-sm-6 form-control" id="street" name="street" placeholder="Exp: Rua Presbitero João Rosa">
          <label class="col-sm-2 pt-1" for="">Numero:</label>
          <input type="text" style="" class="col-sm-2 form-control" id="street_number" name="street_number" placeholder="Exp: 253">
        </div>
        <div class="form-group row mx-0">
          <label class="col-sm-2 pt-1" for="">Categoria:</label>
          <select class="form-control col-sm-4" id="category_id" name="category_id">
            @foreach ($categories as $category)
              <option value="{{$category->id}}">{{$category->name}}</option>
            @endforeach
          </select>
          @if (count($regions)>0)
            <label class="col-sm-2 pt-1" for="">Região:</label>
            <select class="form-control col-sm-4" id="region_id" name="region_id">
              @foreach ($regions as $region)
                <option value="{{$region->id}}">{{$region->name}}</option>
              @endforeach
            </select>

          @endif
        </div>
        <div class="form-group row mx-0">
          <label class="col-sm-2 pt-1" for="">Telefone:</label>
          <input type="text" style="" class="col-sm-4 form-control" id="phone" name="phone" placeholder="Exp: (31) 1234-1234">
          <label class="col-sm-2 pt-1" for="">Site:</label>
          <input type="text" style="" class="col-sm-4 form-control" id="website" name="website" placeholder="Exp: www.fulano.com.br">
        </div>
        <div class="form-group row mx-0">
          <label class="col-sm-2 pt-1" for="exampleTextarea">Descrição:</label>
          <textarea class=" col-sm-10 form-control" id="description" style="resize: none;" name="description" rows="3"></textarea>
        </div>
        <div class="form-group row mx-0">
          <label class="col-sm-2 pt-1" for="exampleTextarea">Descrição:</label>
          <div class="col-sm-10 row mx-0">
            <div class="col-sm-3" id="photo_1">
              <button type="button" id="photo_1-button" class="btn btn-primary col-sm-12" style="top:30%; font-size:16px;" name="button">imagem</button>
            </div>
            <div class="col-sm-3" id="photo_2">
              <button type="button" id="photo_2-button" class="btn btn-primary col-sm-12" style="top:30%; font-size:16px;" name="button">imagem</button>
            </div>
            <div class="col-sm-3" id="photo_3">
              <button type="button" id="photo_3-button" class="btn btn-primary col-sm-12" style="top:30%; font-size:16px;" name="button">imagem</button>
            </div>
            <div class="col-sm-3" id="photo_4">
              <button type="button" id="photo_4-button" class="btn btn-primary col-sm-12" style="top:30%; font-size:16px;" name="button">imagem</button>
            </div>
          </div>
        </div>
        <div class="form-group row mx-0 py-3" style="padding: 1px 15px;">
          <label class="form-check-label">
            <input type="checkbox" class="form-check-input">
            Cliente ativo
          </label>
        </div>
        <div class="form-group row mx-0">
          <div class="col-sm-4" style="margin:auto;">
            <input type="submit" class="btn btn-confirm" name="button" value="Publicar"></input>
            <a class="btn btn-back float-sm-right" href="" name="button">Voltar</a>
          </div>
        </div>
      </form>
  </div>
@endsection
