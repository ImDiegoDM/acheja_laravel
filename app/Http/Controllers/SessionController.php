<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class SessionController extends Controller
{
    public function __construct()
    {
      $this->middleware('guest',['except' => 'destroy']);
    }

    public function index()
    {
      return view('session.login');
    }

    public function create()
    {

      $this->validate(request(),[
        'password'=>'required',
        'email' => 'required',
      ],[
        'password.required'=>'Por favor digite a sua senha',
        'email.required'=>'Por favor digite o seu email',
      ]);

      $user = User::where('email',request()->email)->first();
        if(!$user->have_acess){
          return back()->withErrors([
            'message' => 'Você não possui acesso a plataforma'
          ]);
        }

        if(! auth()->attempt(request(['email','password']),request()->remeber)){
          return back()->withErrors([
            'message' => 'Por favor verifique o email e a senha.'
          ]);
        }

        return redirect()->home();
    }

    public function destroy()
    {
      auth()->logout();

      return redirect()->route('login');
    }
}
