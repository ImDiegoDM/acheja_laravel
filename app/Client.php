<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Client extends Model
{
    protected $fillable=['name','last_activated_at','city_id','street','video_link','street_number','category_id','region_id','description','lng','lat','phone','user_id','actived'];

    protected $dates = [
        'created_at',
        'updated_at',
        'last_activated_at'
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
}
