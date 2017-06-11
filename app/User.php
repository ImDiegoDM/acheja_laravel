<?php

namespace App;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
  use Notifiable;

  protected $fillable = ['email','password','name','user_type_id','phone','email','have_acess'];

    public function user_type()
    {
      return $this->belongsTo(UserType::class);
    }

    public function clients()
    {
      return $this->hasMany(client::class);
    }

    public static function getclients()
    {
      return User::where('user_type_id','!=',1)->get();
    }

    public static function validateRules()
    {
      return [
        'name'=>'required',
        'user_type_id'=>'required',
        'email'=>'nullable|email|unique:users'
      ];
    }

    public static function validateMsgs()
    {
      return [
        'name.required'=>'Por favor insira um nome',
        'user_type_id.required'=>'Por favor escolha um tipo',
        'email.email'=>'Por favor insira um email valido',
        'email.unique'=>'Email já cadastrado'
      ];
    }
}
