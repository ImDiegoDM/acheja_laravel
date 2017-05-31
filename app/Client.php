<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable=['name','city_id','street','street_number','category_id','region_id','description','lng','lat','phone','user_id','actived'];

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
}
