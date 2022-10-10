<?php

namespace App\Repositories;

use App\Models\Category;
use App\Repositories\BaseRepository;
use Image;

/**
 * Class CategoryRepository
 * @package App\Repositories
 * @version May 31, 2022, 8:47 pm UTC
*/

class CategoryRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'parent_id',
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
        return Category::class;
    }
    /**
     * Create a new Category.
     *
     * @param array $input
     *
     * @return Category
     */
    public function createCategory($input)
    {
        $data = $input;
        $image = $input['image'];

        if(!empty($image)){
            // for save original image
            $img = Image::make($image);
            $imgPath = 'uploads/category/';
            $imgName =time().$image->getClientOriginalName();
            $img =  $img->save($imgPath.$imgName);
            $data['image']=$imgName;
        }

        $data['name'] = [
            'en' => $input['name_en'],
            'ar' => $input['name_ar']
        ];
        return $this->create($data);
    }
    /**
     * Update a Category.
     *
     * @param array $input
     * @param int $id
     *
     * @return Category
     */
    public function updateCategory($input,$id)
    {
        $data = $input;
        $image = (isset($input['image']) && !empty($input['image'])) ? $input['image'] : null;
        $category = $this->find($id);
        if(!empty($image)){
            // for save original image
            $img = Image::make($image);
            $imgPath = 'uploads/category/';
            $imgName =time().$image->getClientOriginalName();
            $img =  $img->save($imgPath.$imgName);
            $data['image']=$imgName;
        }
        $data['name'] = [
            'en' => $input['name_en'],
            'ar' => $input['name_ar']
        ];
        return $category->update($data);

    }
}
