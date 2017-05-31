<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Client;
use App\Category;
use App\Region;
use App\City;
use App\User;

class ClientController extends Controller
{

  public function __construct()
  {
    $this->middleware('auth');
  }

    public function index()
    {
      $clients = Client::all();
      $categories = Category::all();
      $cities = City::all();

      //return $clients;

      return view('clients.index')->with('clients',$clients)->with('categories',$categories)->with('cities',$cities);
    }

    public function show(Client $client)
    {
      return view('clients.show',compact('client'));
    }

    public function store(Request $request)
    {

      $this->validate($request,[
        'logo'=>'required|image',
        'city_id' => 'required',
        'photo1' => 'image|nullable',
        'photo2' => 'image|nullable',
        'photo3' => 'image|nullable',
        'photo4' => 'image|nullable',
        'website' => 'url|nullable',
        'name'=>'required',
        'street' =>'required',
        'street_number' => 'required|numeric',
        'category_id' => 'required',
        'description' => 'required'
      ],
      [
        'city_id.required' => 'Por favor selecione uma cidade',
        'responsible.required' => 'Por favor preencha o campo de responsável',
        'logo.required'=>'Por favor insira uma logo',
        'logo.file'=>'A logo deve ser um arquivo de imagem',
        'logo.image'=>'A logo deve ser uma imagem do tipo jpeg, png, bmp, gif, ou svg',
        'photo1.file'=>'A Imagem 1 deve ser um arquivo de imagem',
        'photo1.image'=>'A Imagem 1 deve ser uma imagem do tipo jpeg, png, bmp, gif, ou svg',
        'photo2.file'=>'A Imagem 2 deve ser um arquivo de imagem',
        'photo2.image'=>'A Imagem 2 deve ser uma imagem do tipo jpeg, png, bmp, gif, ou svg',
        'photo3.file'=>'A Imagem 3 deve ser um arquivo de imagem',
        'photo3.image'=>'A Imagem 3 deve ser uma imagem do tipo jpeg, png, bmp, gif, ou svg',
        'photo4.file'=>'A Imagem 4 deve ser um arquivo de imagem',
        'photo4.image'=>'A Imagem 4 deve ser uma imagem do tipo jpeg, png, bmp, gif, ou svg',
        'website.url' => 'O site deve ser uma url valida',
        'name.required'=>'Por favor digite um nome',
        'street.required' =>'Por favor insira um endereço',
        'street_number.required' => 'Por favor insira o numero da rua',
        'street_number.numeric' => 'O numero da rua deve conter apenas numeros',
        'category_id.required' => 'Por favor escolha uma categoria',
        'description.required' => 'Por favor escreva uma breve descrição do cliente'
      ]);
      $city = City::find($request->city_id);
      $geocodeUrl='https://maps.googleapis.com/maps/api/geocode/json?address='.$request->street_number.'+'.str_replace(" ","+",$request->street).'+'.str_replace(" ","+",$city->name).'+'.str_replace(" ","+",$city->state_id).'&key='.env('GOOGLE_MAPS_KEY');
      $jsonresponse= json_decode(file_get_contents($geocodeUrl), true);

      $request->request->add(['lat' => $jsonresponse['results'][0]['geometry']['location']['lat']]);
      $request->request->add(['lng' => $jsonresponse['results'][0]['geometry']['location']['lng']]);

      $client = Client::create($request->all());
      $client->save();

      $logoPath = $request->logo->storeAs('public/' . $request->name .'-'. $client->id,$request->name . "logo." . $request->logo->extension());
      $client->logo_url = $logoPath;

      if($request->hasFile('photo1')){
        $photo1Path = $request->photo1->storeAs('public/' . $request->name .'-'. $client->id,$request->name . "Image1." . $request->photo1->extension());
        $client->photo_1 = $photo1Path;
      }

      if($request->hasFile('photo2')){
        $photo2Path = $request->photo2->storeAs('public/' . $request->name .'-'. $client->id,$request->name . "Image2." . $request->photo2->extension());
        $client->photo_2 = $photo2Path;
      }

      if($request->hasFile('photo3')){
        $photo3Path = $request->photo3->storeAs('public/' . $request->name .'-'. $client->id,$request->name . "Image3." . $request->photo3->extension());
        $client->photo_3 = $photo3Path;
      }

      if($request->hasFile('photo4')){
        $photo4Path = $request->photo4->storeAs('public/' . $request->name .'-'. $client->id,$request->name . "Image4." . $request->photo4->extension());
        $client->photo_4 = $photo4Path;
      }

      $client->update();

      return view('menu.index');
    }

    public function register()
    {
      $categories = Category::all();
      $regions = Region::all();
      $cities = City::all();
      $users = User::where('user_type_id','!=',1)->get();

      return view('clients.register')->with('categories',$categories)->with('regions',$regions)->with('cities',$cities)->with('users',$users);
    }
}
