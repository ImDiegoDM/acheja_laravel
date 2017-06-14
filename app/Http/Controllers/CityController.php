<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\City;

class CityController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
    $this->middleware('admin');
  }


  public function create()
  {
    $this->validate(request(),[
      'name'=>'required',
    ],[
      'name.required' => 'Cidade não adicionada, motivo: sem nome',
    ]);

    City::create(request()->all());

    return back()->with('success','Cidade criada com sucesso!');
  }

  public function delete(City $city)
  {
    $city->delete();

    return redirect()->route('content')->with('success','Cidade excluida com sucesso!');
  }
}
