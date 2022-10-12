<?php

namespace App\Repositories;

use App\Models\Ad;
use App\Repositories\BaseRepository;
use Image;

/**
 * Class AdRepository
 * @package App\Repositories
 * @version May 31, 2022, 8:46 pm UTC
*/

class AdRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [

    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Ad::class;
    }

    /**
     * Create a new Ad.
     *
     * @param array $input
     *
     * @return Ad
     */
    public function createAd($input){
        $data = $input;
        $data['name'] =  $input['name'];
        $data['details'] = $input['details'];
        $data['category_id'] = $input['category_id'];
        $data['country_id'] = $input['country_id'];
        $data['city_id'] = $input['city_id'];
        $data['user_id'] = auth()->user()->id;
        if(isset($input['image'])){

            $data['image'] = $this->uploadImage($input['image']);
        }
        return $this->create($data);
    }
    /**
     * Update a Ad.
     *
     * @param array $input
     * @param int $id
     *
     * @return Ad
     */
    public function updateAd($input,$id)
    {
        $data = $input;
        $image = $input['image'];
        if(!empty($image)){
            // for save original image
            $img = Image::make($image);
            $imgPath = 'uploads/ads/';
            $imgName =time().$image->getClientOriginalName();
            $img =  $img->save($imgPath.$imgName);
            $data['image']=$imgName;
        }
        $data['name'] =  $input['name'];
        $data['details'] = $input['details'];
        return $this->update($data, $id);
    }

    /**
     * getAdsByCategory
     */
    public function getAdsByCategory($category_id)
    {
        return $this->model->where('subcategory_id', $category_id)
                            ->paginate(10);
    }
    /**
     * getSimilarAds
     */
    public function getSimilarAds($category_id,$id)
    {
        return $this->model->where('category_id', $category_id)
                            ->orWhere('subcategory_id',$category_id)
                            ->where('id','!=',$id)
                            ->get();
    }

    /**
     * getAdsByUser
     */
    public function getAdsByUser($user_id)
    {
        return $this->model->where('user_id', $user_id)
                            ->get();
    }
    /**
     * uploadImage
     */
    public function uploadImage($image){
        $img = Image::make($image);
        $imgPath = 'uploads/ads/';
        $imgName =time().$image->getClientOriginalName();
        $img =  $img->save($imgPath.$imgName);
        return $imgName;
    }

}
