<div class="d-block myCard mb-sm-3" style="width:100%">
  @if ($client->logo_url)
    <img class="" style="width:100px; height:auto;" src="{{env('APP_URL') . '/storage/app/' . $client->logo_url}}" alt="Card image cap">
  @else
    <p style="width:100px; height:auto; background-color:#e0e0e0;border-radius:9px; border: dotted #a2a2a2 3px; font-size:12px;" class="d-inline-block text-center p-3">Logo não encontrada, cadastre uma logo</p>
  @endif
  <p class="d-inline-block ml-1" style="vertical-align: top;">
    {{$client->name}} <br>
    {{$client->city->name}} {{$client->city->state_id}} <br>
    {{$client->street}} {{$client->street_number  }} @if($client->phone) <br>
    {{Helper::mask($client->phone,'(**) ****-****')}} @endif <br>
    <i>{{$client->category->name}}</i>
  </p>
  <p class="d-block" style="font-size:12px;font-weight: bold;position:absolute;right:1.5rem;">
  Cliente desde: {{ $client->created_at->setTimezone('-4')->format('d/m/Y')}}</p>
</div>
