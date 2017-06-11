<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use App\Events\ClientCreateOrUpdate;
use App\Events\ClientCreatedOrUpdated;

class Client extends Model
{
    protected $fillable=['name','last_activated_at','city_id','street','video_link','street_number','category_id','region_id','description','lng','lat','phone','user_id','actived'];

    protected $dates = [
        'created_at',
        'updated_at',
        'last_activated_at'
    ];

    public static $FIRE_EVENTS = true;

    protected $events =[
      'creating'=> ClientCreateOrUpdate::class,
      'updating'=> ClientCreateOrUpdate::class,
      'created'=> ClientCreatedOrUpdated::class,
      'updated'=> ClientCreatedOrUpdated::class,
    ];

    public function category()
    {
      return $this->belongsTo(Category::class);
    }



    public function city()
    {
      return $this->belongsTo(City::class);
    }



    public function user()
    {
      return $this->belongsTo(User::class);
    }



    public function disable()
    {
      return $this->update(['actived'=>false]);
    }



    public function active()
    {
      return $this->update(['actived'=>true,'last_activated_at'=>Carbon::now()]);
    }



    public static function validateRulesForCreate()
    {
      return [
        'logo'=>'required|image',
        'city_id' => 'required',
        'photo1' => 'image|nullable',
        'photo2' => 'image|nullable',
        'photo3' => 'image|nullable',
        'photo4' => 'image|nullable',
        'website' => 'url|nullable',
        'video_link' => 'nullable|url',
        'name'=>'required',
        'street' =>'required',
        'street_number' => 'required|numeric',
        'category_id' => 'required',
        'description' => 'required'
      ];
    }



    public static function validateRulesForUpdate()
    {
      return [
        'logo'=>'nullable|image',
        'city_id' => 'required',
        'photo1' => 'image|nullable',
        'photo2' => 'image|nullable',
        'photo3' => 'image|nullable',
        'photo4' => 'image|nullable',
        'website' => 'url|nullable',
        'video_link' => 'nullable|url',
        'name'=>'required',
        'street' =>'required',
        'street_number' => 'required|numeric',
        'category_id' => 'required',
        'description' => 'required'
      ];
    }



    public static function validateMessages()
    {
      return
      [
        'city_id.required' => 'Por favor selecione uma cidade',
        'video_link' => 'O link do video deve ser uma url valida',
        'responsible.required' => 'Por favor preencha o campo de responsável',
        'logo.required'=>'Por favor insira uma logo',
        'logo.file'=>'A logo deve ser um arquivo de imagem',
        'logo.image'=>'A logo deve ser uma imagem do tipo jpeg, png, bmp, gif, ou svg',
        'photo1.file'=>'A Imagem 1 deve ser um arquivo de imagem',
        'photo1.image'=>'A Imagem 1 deve ser uma imagem do tipo jpeg, png, bmp, gif, ou svg',
        'photo2.file'=>'A Imagem 2 deve ser um arquivo de imagem',
        'photo2.image'=>'A Imagem 2 deve ser uma imagem do tipo jpeg, png, bmp, gif, ou svg',
        'photo3.file'=>'A Imagem 3 deve ser um arquivo de imagem',
        'photo3.image'=>'A Imagem 3 deve ser uma imagem do tipo jpeg, png, bmp, gif, ou svg',
        'photo4.file'=>'A Imagem 4 deve ser um arquivo de imagem',
        'photo4.image'=>'A Imagem 4 deve ser uma imagem do tipo jpeg, png, bmp, gif, ou svg',
        'website.url' => 'O site deve ser uma url valida',
        'name.required'=>'Por favor digite um nome',
        'street.required' =>'Por favor insira um endereço',
        'street_number.required' => 'Por favor insira o numero da rua',
        'street_number.numeric' => 'O numero da rua deve conter apenas numeros',
        'category_id.required' => 'Por favor escolha uma categoria',
        'description.required' => 'Por favor escreva uma breve descrição do cliente'
      ];
    }
}
