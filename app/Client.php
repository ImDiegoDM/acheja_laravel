<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    public function category()
    {
      return $this->belongsTo(Category::class);
    }

    public function city()
    {
      return $this->belongsTo(City::class);
    }
}
