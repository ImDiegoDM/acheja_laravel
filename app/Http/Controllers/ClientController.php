<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Client;
use App\Category;

class ClientController extends Controller
{
    public function index()
    {
      $clients = Client::all();
      $categories = Category::all();

      //return $clients;

      return view('clients')->with('clients',$clients)->with('categories',$categories);
    }
}
