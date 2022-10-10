<?php

namespace App\Repositories;

use App\Models\Favourite;
use App\Repositories\BaseRepository;

/**
 * Class FavouriteRepository
 * @package App\Repositories
 * @version May 31, 2022, 8:50 pm UTC
*/

class FavouriteRepository extends BaseRepository
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
        return Favourite::class;
    }
}
