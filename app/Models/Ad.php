<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
//use Spatie\Translatable\HasTranslations;

use CyrildeWit\EloquentViewable\InteractsWithViews;
use CyrildeWit\EloquentViewable\Contracts\Viewable;

class Ad extends Model implements Viewable
{
    use InteractsWithViews;
    use SoftDeletes;
  //  use HasTranslations;


    use HasFactory;

    public $table = 'ads';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'name',
        'communication',
        'latitude',
        'longitude',
        'details',
        'user_id',
        'country_id',
        'city_id',
        'category_id',
        'subcategory_id',
        'commentable',
        'price',
        'image',
        'feature',
    ];

    //public $translatable = ['name', 'details'];

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
     * country relation
     */
    public function country(){
        return $this->belongsTo(Country::class);
    }

    /**
     * country relation
     */
    public function city(){
        return $this->belongsTo(City::class);
    }

    /**
     * country relation
     */
    public function user(){
        return $this->belongsTo(User::class);
    }

    /**
     * category relation
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    /**
     * subcategory relation
     */
    public function subcategory(){
        return $this->belongsTo(Category::class,'subcategory_id','id');
    }
    /**
     * ad_images relation
     */
    public function images()
    {
        return $this->hasMany(Upload::class, 'ad_id', 'id');
    }

    public function getKey()
    {
        // TODO: Implement getKey() method.
    }

    public function getMorphClass()
    {
        // TODO: Implement getMorphClass() method.
    }

    public function favourites(){
        return $this->morphMany('App\Models\Favourite', 'favouritable');
    }
    /**
     * image url
     */
    public function getImageAttribute($value){
        if(!empty($value)){
            return \Request::root().'/uploads/ads/'.$value;
        }

    }
    /**
     * comments relation
     */
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
