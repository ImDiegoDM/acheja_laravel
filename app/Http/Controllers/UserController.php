<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UserType;
use App\User;

class UserController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
    $this->middleware('admin');
  }

  public function register()
  {
    $user_types = UserType::all();

    return view('users.register')->with('user_types',$user_types);
  }

  public function show(User $user)
  {
    return view('users.show')->with('user',$user);
  }

  public function index()
  {
    $users = User::where('id','!=',auth()->user()->id)->get();

    return view('users.index')->with('users',$users);
  }

  public function store()
  {
    $this->validate(request(),[
      'name'=>'required',
      'user_type_id'=>'required',
      'email'=>'nullable|email|unique:users'
    ],[
      'name.required'=>'Por favor insira um nome',
      'user_type_id.required'=>'Por favor escolha um tipo',
      'email.email'=>'Por favor insira um email valido',
      'email.unique'=>'Email já cadastrado'
    ]);

     User::create(request()->all());

     return view('users.registerComplete');
  }
}
