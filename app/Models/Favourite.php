<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Favourite
 * @package App\Models
 * @version May 31, 2022, 8:41 pm UTC
 *
 */
class Favourite extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'favouritable_id', 'favouritable_type'];

    public function favouritable()
    {
        return $this->morphTo();
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
