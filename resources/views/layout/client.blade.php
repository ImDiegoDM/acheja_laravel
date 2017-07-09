<div class="row py-3 clientBackground {{ $client->actived ? " active" : " disable" }}" style=>
  <div class="col-sm-6">
    <h1 class="mb-0">{{$client->name}}</h1>
    <h4 class="ml-4">{{$client->category->name}}</h4>
    <div class="d-inline-block" style="font-size:12px;position: absolute; bottom:-29px;">
      @if ($client->actived)
        <p>Criado em {{$client->created_at->setTimezone('-4')->format('d/m/Y')}} <br>
          @if ($client->last_activated_at)
            Ativado pela ultima vez em {{$client->last_activated_at->setTimezone('-4')->format('d/m/Y')}}</p>
          @endif
      @else
        <p>Cliente atualmente desativado</p>
      @endif
    </div>
  </div>
  <div class="col-sm-6 pr-5">
    @if ($client->logo_url)
      <img class="d-inline-block float-sm-right" style="max-width:206px; max-height:116px;" src="{{env('APP_URL') . '/storage/app/' . $client->logo_url}}" alt="Card image cap">
    @else
      <p style="width:100px; height:auto; background-color:#e0e0e0;border-radius:9px; border: dotted #a2a2a2 3px; font-size:12px;" class="d-inline-block text-center p-3">Logo não encontrada, cadastre uma logo</p>
    @endif
  </div>
</div>
