<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Translatable\HasTranslations;

/**
 * Class Country
 * @package App\Models
 * @version May 31, 2022, 8:38 pm UTC
 *
 */
class Country extends Model
{
    use SoftDeletes;

    use HasFactory;

    use HasTranslations;

    public $table = 'countries';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'name',
        'status',

    ];

    public $translatable = ['name'];

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
     * ads relation
     */
    public function ads(){
        return $this->hasMany(Ad::class);
    }

    /**
     * city relation
     */
    public function cities(){
        return $this->hasMany(City::class);
    }

}
