<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Message extends Model
{

    protected $fillable = ['message', 'is_seen', 'user_id', 'conversation_id','type','image','ad_id'];
     public function getCreatedAtAttribute($value)
    {
        //return $value;
        return Carbon::parse($value)->timezone(\Config::get('app.timezone'))->format('Y-m-d H:i:s');
    }

    public function getUpdatedAtAttribute($value)
    {
        return Carbon::parse($value)->timezone(\Config::get('app.timezone'))->format('Y-m-d H:i:s');
    }

    public function user() {
        return $this->belongsTo('App\Models\User');
    }

    public function conversation() {
        return $this->belongsToMany('App\Models\Conversation');
    }
        public function ad(){
        return $this->belongsTo('App\Models\Ad')->join('users', 'ads.user_id', '=', 'users.id')->join('cities', 'cities.id', '=', 'ads.city_id')
          ->select('ads.id','ads.title','cities.name as cityName','ads.created_at','users.id as userId','users.username as userName','users.phone as userPhone','users.image as userImage');
                  ;
    }
}
