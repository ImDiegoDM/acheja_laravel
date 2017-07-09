@extends('layout.base')

@section('top')
  <div class="container-fluid">
    <div class="row m-0">
      <div class="col-sm-2 pt-2 px-0">
        <a href="{{env('APP_URL').'/admin/home'}}"><img src="{{  env('APP_URL').('/public/img/acheja.png')}}" class="p-relative horizontal-center " style="width:100%;" alt=""></a>
      </div>
      <div class="col-sm-7 pt-2 ">
        <h4 class="p-relative horizontal-center float-sm-right text-center menu-name smooth-border" style="width:90%;">Usuarios</h4>
      </div>
      <div class="col-sm-3">
        @include('layout.user')
      </div>
    </div>
  <hr class="mt-2 mb-4">
  </div>
@stop

@section('content')
  <div class="myContainer absoluteFullcontent">
    <h4 class="mt-3">Usuarios cadastrados no sistema</h4>
    <div class="max100">
      <table class="table table-striped">
        <tr>
          <th>Nome</th>
          <th>Email</th>
          <th>Telefone</th>
          <th>Tipo</th>
          <th>Possui acesso?</th>
          <th>Criado em</th>
        </tr>
        @foreach ($users as $user)
            <tr class="hover" onclick="showCliente({{$user->id}})">
              <td>{{$user->name}}</td>
              <td>{{$user->email}}</td>
              <td>{{$user->phone}}</td>
              <td>{{$user->user_type->name}}</td>
              @if ($user->have_acess)
                <td>sim</td>
              @else
                <td>não</td>
              @endif
              <td>{{$user->created_at->setTimezone('-4')->format('d/m/Y')}}</td>
            </tr>
        @endforeach
      </table>
    </div>
  </div>

  <script type="text/javascript">
    function showCliente(index) {
      window.location.href="{{env('APP_URL')}}/admin/user/"+index;
    }
  </script>
@endsection
