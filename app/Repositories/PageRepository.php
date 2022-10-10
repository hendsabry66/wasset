<?php

namespace App\Repositories;

use App\Models\Page;
use App\Repositories\BaseRepository;

/**
 * Class PageRepository
 * @package App\Repositories
 * @version May 31, 2022, 8:50 pm UTC
*/

class PageRepository extends BaseRepository
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
        return Page::class;
    }
    /**
     * create page
     */
    public function createPage($input)
    {
        $data = $input;
        $image = (isset($input['image']) ? $input['image'] : null);

        if(!empty($image)){
            // for save original image
            $img = Image::make($image);
            $imgPath = 'uploads/page/';
            $imgName =time().$image->getClientOriginalName();
            $img =  $img->save($imgPath.$imgName);
            $data['image']=$imgName;
        }
        $data['title']=[
           'en'=>$input['title_en'],
              'ar'=>$input['title_ar']
        ];
        $data['details']=[
         'en'=>$input['details_en'],
         'ar'=>$input['details_ar']
        ];
        return $this->create($data);
    }
    /**
     * update page
     */
    public function updatePage($input,$id)
    {
        $data = $input;
        $image = (isset($input['image']) ? $input['image'] : null);

        if(!empty($image)){
            // for save original image
            $img = Image::make($image);
            $imgPath = 'uploads/page/';
            $imgName =time().$image->getClientOriginalName();
            $img =  $img->save($imgPath.$imgName);
            $data['image']=$imgName;
        }

        $data['title']=[
           'en'=>$input['title_en'],
              'ar'=>$input['title_ar']
        ];

        $data['details']=[
         'en'=>$input['details_en'],
         'ar'=>$input['details_ar']
        ];
        return $this->update($data,$id);

    }

}
