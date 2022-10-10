<?php

namespace App\Repositories;

use App\Models\Country;
use App\Repositories\BaseRepository;

/**
 * Class CountryRepository
 * @package App\Repositories
 * @version May 31, 2022, 8:50 pm UTC
*/

class CountryRepository extends BaseRepository
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
        return Country::class;
    }

    public function deleteRelatedCities($country){
        return $country->cities()->delete();


    }

    public function createCountry($input){
        $data =$input;
        $data['name']=[
            'en'=>$input['name_en'],
            'ar'=>$input['name_ar']
        ];
        return $this->create($data);
    }

    public function updateCountry($input,$id){
        $data =$input;
        $data['name']=[
            'en'=>$input['name_en'],
            'ar'=>$input['name_ar']
        ];
        return $this->update($data,$id);
    }
}
