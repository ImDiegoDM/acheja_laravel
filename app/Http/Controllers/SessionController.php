<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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

    public function create(Request $request)
    {
        if(! auth()->attempt(request(['email','password']),$request->remeber)){
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
