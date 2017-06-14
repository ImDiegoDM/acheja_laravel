<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\City;
use App\State;
use App\Region;
use App\Category;

class ContentController extends Controller
{

  public function __construct()
  {
    $this->middleware('auth');
    $this->middleware('admin'); 
  }


  public function index()
  {
    $states = State::all();
    $regions = Region::all();
    $categories = Category::all();

    return view('content.index', compact('states','regions','categories'));
  }
}
