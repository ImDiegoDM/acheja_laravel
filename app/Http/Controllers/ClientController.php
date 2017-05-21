<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Client;
use App\Category;
use App\Region;
use App\City;

class ClientController extends Controller
{
    public function index()
    {
      $clients = Client::all();
      $categories = Category::all();

      //return $clients;

      return view('clients.index')->with('clients',$clients)->with('categories',$categories);
    }

    public function register()
    {
      $categories = Category::all();
      $regions = Region::all();
      $cities = City::all();

      return view('clients.register')->with('categories',$categories)->with('regions',$regions)->with('cities',$cities);
    }
}
