<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UserType;
use App\User;
use App\UserToken;
use App\Mail\Welcome;
use App\Mail\SetPassword;

class UserController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth')->except('setPassword','savePassoword');
    $this->middleware('admin')->except('setPassword','savePassoword');
  }

  public function register()
  {
    $user_types = UserType::all();

    return view('users.register')->with('user_types',$user_types);
  }

  public function giveAcess(User $user)
  {

    if(!$user->have_acess){
      $token = UserToken::create(['user_id'=>$user->id])->id;

      \Mail::to($user->email)->send(new SetPassword($token));

      return redirect()->back()->with('success','E-mail enviado para o usuario cadastrar uma senha, depois que o usuario cadastrar a senha o acesso será liberado para ele');
    }
  }

  public function setPassword()
  {

    if(auth()->user()!=null){
      return redirect()->home();
    }

    if($token = UserToken::find(request()->token)){

      return view('users.setPassword')->with('user', $token->user);
    }
    else {
      return redirect()->route('login');
    }
  }

  public function savePassoword(User $user)
  {
    if($token = UserToken::find(request()->token)){
      //$user continue aqui
    }
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

     $this->validate(request(),User::validateRules(),User::validateMsgs());

     $user = User::create(request()->all());
     if($user->email){
       \Mail::to($user->email)->send(new Welcome($user));
     }

     return view('users.registerComplete');
  }
}
