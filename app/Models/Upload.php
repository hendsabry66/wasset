<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Upload
 * @package App\Models
 * @version May 31, 2022, 8:39 pm UTC
 *
 */
class Upload extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'uploads';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'ad_id',
        'name',
        'type',
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
    public function getNameAttribute($value){
        if(!empty($value)){
            return \Request::root().'/uploads/ads/'.$value;
        }

    }
    /**
     * ad relation
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */


    public function ad(){
        return $this->belongsTo('App\Models\Ad');
    }



}
