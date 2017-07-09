<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Promotion extends Model
{
  protected $fillable = ['title','description','begin','end','client_id'];

  protected $dates = [
      'created_at',
      'updated_at',
      'begin',
      'end',
  ];

  public function setBeginAttribute($value)
  {
    if($value){
      $this->attributes['begin'] = Carbon::createFromFormat('d/m/Y', $value);
    }
  }

  public function setEndAttribute($value)
  {
    if($value){
      $this->attributes['end'] = Carbon::createFromFormat('d/m/Y', $value);
    }
  }

  public function client()
  {
    return $this->belongsTo(Client::class);
  }

  public static function Rules()
  {
    return [
      'title' => 'required',
      'description' => 'required',
      'begin' => 'nullable|date_format:d/m/Y',
      'end' => 'nullable|date_format:d/m/Y',
    ];
  }

  public static function RulesMessage()
  {
    return [
      'title.required' => 'Não é possivel cadastrar promoção sem titulo',
      'description.required' => 'Não é possivel cadastrar promoção sem descrição',
      'begin.date_format:d/m/Y' => 'Data em que a promoção começa não é uma data valida',
      'end.date_format:d/m/Y' => 'Data em que a promoção começa não é uma data valida'
    ];
  }
}
