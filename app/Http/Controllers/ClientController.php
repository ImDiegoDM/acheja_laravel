<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Client;
use App\Category;
use App\Region;
use App\City;
use App\User;
use App\Helper;

class ClientController extends Controller
{

  public function __construct()
  {
    $this->middleware('auth',['except'=> ['apiIndex','apiShow']]);
    $this->middleware('admin',['except'=> ['apiIndex','apiShow']]);
  }

    public function index()
    {
      $categories = Category::all();
      $cities = City::all();

      if(request()->category&&request()->city){
        $clients = Client::where('category_id',request()->category)->where('city_id',request()->city)->get();
      }
      elseif (request()->category) {
        $clients = Client::where('category_id',request()->category)->get();
      }
      elseif (request()->city) {
        $clients = Client::where('city_id',request()->city)->get();
      }
      else {
        $clients = Client::all();
      }

      return view('clients.index')->with('clients',$clients)->with('categories',$categories)->with('cities',$cities);
    }

    public function apiShow(Client $client)
    {
      $client = $client->ApiFormat([
        'id',
        'name',
        'street',
        'street_number',
        'lng',
        'lat',
        'description',
        'phone',
        'website',
        'logo_url',
        'photo_1',
        'photo_2',
        'photo_3',
        'photo_4',
        'video_link',
        'category',
        'actived',
        'city',
        'region',
        'created_at'
      ]);
      return $client;
    }

    public function apiIndex()
    {
      $clients = Client::selectAtributes([
        'id',
        'name',
        'street',
        'street_number',
        'lng',
        'lat',
        'description',
        'phone',
        'website',
        'logo_url',
        'photo_1',
        'photo_2',
        'photo_3',
        'photo_4',
        'video_link',
        'category',
        'actived',
        'city',
        'region',
        'created_at'
      ]);
      if(request()->lat&&request()->lng){
        foreach ($clients as $client) {
          $client->distance=Helper::DistanceOfTwoPoints(request()->lat,request()->lng,$client->lat,$client->lng);
        }
      }
      return $clients;
    }

    public function show(Client $client)
    {

      return view('clients.show',compact('client'));
    }

    public function edit(Client $client)
    {
      $categories = Category::all();
      $regions = Region::all();
      $cities = City::all();
      $users = User::getclients();

      return view('clients.edit')->with('categories',$categories)->with('regions',$regions)->with('cities',$cities)->with('users',$users)->with('client',$client);
    }

    public function update(Client $client,Request $request)
    {

      $this->validate($request,Client::validateRulesForUpdate(),Client::validateMessages());

      $client->update(request()->all());

      return view('clients.updatesucess');
    }

    public function active(client $client)
    {
      if($client->active()){
        return redirect('admin/client/'.$client->id);
      }
    }

    public function disable(client $client)
    {
      if($client->disable()){
        return redirect('admin/client/'.$client->id);
      }
    }

    public function store(Request $request)
    {

      $this->validate($request,Client::validateRulesForCreate(),Client::validateMessages());

      $client = Client::create($request->all());
      $client->save();

      return view('clients.sucess');
    }

    public function register()
    {
      $categories = Category::all();
      $regions = Region::all();
      $cities = City::all();
      $users = User::getclients();

      return view('clients.register')->with('categories',$categories)->with('regions',$regions)->with('cities',$cities)->with('users',$users);
    }
}
