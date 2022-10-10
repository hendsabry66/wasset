<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'rated_user_id', 'rating'];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function ratedUser()
    {
        return $this->belongsTo('App\Models\User', 'rated_user_id');
    }





}
