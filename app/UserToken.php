<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Events\UserTokenCreate;

class UserToken extends Model
{
    public $incrementing = false;

    protected $fillable=['user_id'];

    protected $events = [
        'creating' => UserTokenCreate::class,
    ];

    public function user()
    {
      return $this->belongsTo(User::class);
    }
}
