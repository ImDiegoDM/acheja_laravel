<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Region;

class RegionController extends Controller
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
      'name.required' => 'Região não adicionada, motivo: sem nome',
    ]);

    Region::create(request()->all());

    return back()->with('success','Região criada com sucesso!');
  }

  public function delete(Region $region)
  {
    $region->delete();

    return redirect()->route('content')->with('success','Região excluida com sucesso!');
  }
}
