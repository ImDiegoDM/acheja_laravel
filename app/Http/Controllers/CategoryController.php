<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
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
      'name.required' => 'Categoria não adicionada, motivo: sem nome',
    ]);

    Category::create(request()->all());

    return back()->with('success','Categoria criada com sucesso!');
  }

  public function delete(Category $category)
  {
    $category->delete();

    return redirect()->route('content')->with('success','Categoria excluida com sucesso!');
  }
}
