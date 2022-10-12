<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
class Conversation extends Model
{
    protected $table = 'conversations';
    protected $fillable = ['sender_id', 'reciver_id','ad_id'];
    protected $appends = ['unReadMessageCount'];

         public function getCreatedAtAttribute($value)
    {
        return Carbon::parse($value)->format('Y-m-d H:i:s');
    }

    public function getUpdatedAtAttribute($value)
    {
        return Carbon::parse($value)->format('Y-m-d H:i:s');
    }
    public function scopeOrderByLastMessage($query, $direction = 'desc')
{
    $query->orderBy(Message::select('created_at')
        ->whereColumn('messages.conversation_id', 'conversations.id')
        ->latest('created_at')
        ->take(1),
        $direction
    );
}

    public function user() {
        return $this->belongsTo('App\Models\User','reciver_id');
    }
    public function messages() {
        return $this->hasMany('App\Models\Message');
    }

    public function latest_message(){
        return $this->hasOne('App\Models\Message', 'conversation_id', 'id')->latest('created_at')->orderBy('id', 'desc');
    }
    public function getUnReadMessageCountAttribute(){
        return $this->messages()->where('user_id','!=',auth()->user()->id)->where('is_seen',0)->count();
    }

}
