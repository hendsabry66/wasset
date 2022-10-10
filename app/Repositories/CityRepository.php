<?php

namespace App\Repositories;

use App\Models\City;
use App\Repositories\BaseRepository;

/**
 * Class CityRepository
 * @package App\Repositories
 * @version May 31, 2022, 8:48 pm UTC
*/

class CityRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'country_id',
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
        return City::class;
    }

    /**
     *create city
     */
    public function createCity($input)
    {
        $data = $input;
        $data['name']=[
            'en'=>$input['name_en'],
            'ar'=>$input['name_ar']
        ];
        return $this->create($data);
    }

    /**
     *update city
     */
    public function updateCity($input,$id)
    {
        $data = $input;
        $data['name']=[
            'en'=>$input['name_en'],
            'ar'=>$input['name_ar']
        ];
        return $this->update($data,$id);
    }
}
