<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Client;
use App\Promotion;

class PromotionController extends Controller
{

  public function __construct()
  {
    $this->middleware('auth');
    $this->middleware('admin');
  }

   public function index(Client $client)
   {
     $promotions = $client->promotions;

     return view('promotions.index',compact('client','promotions'));
   }

   public function update(Promotion $promotion)
   {
     $this->validate(request(),Promotion::Rules(),Promotion::RulesMessage());
     $promotion->update(request()->all());

     return back()->with('success','Promoção alterada com sucesso!');
   }

   public function save(Client $client)
   {
     $this->validate(request(),Promotion::Rules(),Promotion::RulesMessage());

     request()->request->add(['client_id' => $client->id]);

     Promotion::create(request()->all());

     return back()->with('success','Promoção criada com sucesso!');
   }

   public function delete(Promotion $promotion)
   {
     $promotion->delete();

     return back()->with('success','Promoção excluida com sucesso!');
   }
}
