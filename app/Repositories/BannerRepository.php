<?php

namespace App\Repositories;

use App\Models\Banner;
use App\Repositories\BaseRepository;
use Image;

/**
 * Class BannerRepository
 * @package App\Repositories
 * @version May 31, 2022, 8:47 pm UTC
*/

class BannerRepository extends BaseRepository
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
        return Banner::class;
    }

    /**
     * create banner
     */
    public function createBanner($input){
        $data = $input;
        $image = (isset($input['image'])) ? $input['image'] : null;

        if(!empty($image)){
            // for save original image
            $img = Image::make($image);
            $imgPath = 'uploads/banner/';
            $imgName =time().$image->getClientOriginalName();
            $img =  $img->save($imgPath.$imgName);
            $data['image']=$imgName;
        }
        $data['details'] =[
            'en'=>$input['details_en'],
            'ar'=>$input['details_ar'],
        ];
        return $this->create($data);
    }

    /*
     * update banner
     */
    public function updateBanner($input,$id)
    {
        $data = $input;
        $image = (isset($input['image'])) ? $input['image'] : null;
        if (!empty($image)) {
            // for save original image
            $img = Image::make($image);
            $imgPath = 'uploads/banner/';
            $imgName = time() . $image->getClientOriginalName();
            $img = $img->save($imgPath . $imgName);
            $data['image'] = $imgName;
        }

        $data['details'] = [
            'en'=>$input['details_en'],
            'ar' => $input['details_ar'],
        ];
        return $this->update($data , $id);
    }
}
