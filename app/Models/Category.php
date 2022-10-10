<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Translatable\HasTranslations;

/**
 * Class Category
 * @package App\Models
 * @version May 31, 2022, 8:38 pm UTC
 *
 */
class Category extends Model
{
    use SoftDeletes;

    use HasFactory;

    use HasTranslations;

    public $table = 'categories';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'name',
        'parent_id',
        'image',
        'status',
        'order',
        'display_in_home'
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
     * image url
     */
    public function getImageAttribute($value){
        if(!empty($value)){
            return \Request::root().'/uploads/category/'.$value;
        }

    }
    /**
     * ad relation
     */
    public function ads()
    {
        return $this->hasMany('App\Models\Ad');
    }
    /**
     * Define the relation with other categories
     *
     * @return mixed
     */
    public function parent_category(){
        return $this->belongsTo(Category::class,'parent_id', 'id');
    }
    /**
     * Define the relation with other categories
     *
     * @return mixed
     */
    public function children(){
        return $this->hasMany(Category::class,'parent_id', 'id');
    }


}
