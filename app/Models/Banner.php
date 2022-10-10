<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Translatable\HasTranslations;

/**
 * Class Banner
 * @package App\Models
 * @version May 31, 2022, 8:41 pm UTC
 *
 */
class Banner extends Model
{
    use SoftDeletes;

    use HasFactory;

    use HasTranslations;

    public $table = 'banners';


    protected $dates = ['deleted_at'];

    public $translatable = ['details'];

    public $fillable = [
        'image',
        'details'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [

    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [

    ];

    /**
     * image url
     */
    public function getImageAttribute($value){
        if(!empty($value)){
            return \Request::root().'/uploads/banner/'.$value;
        }

    }


}
