<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class View extends Model
{
    use HasFactory;
    public $fillable =[
        'ip',
        'user_id',
        'ad_id',
        'category_id'
    ];
}
