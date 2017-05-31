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
}
