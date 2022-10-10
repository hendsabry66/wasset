<?php

namespace App\Repositories;

use App\Models\Upload;
use App\Repositories\BaseRepository;

/**
 * Class UploadRepository
 * @package App\Repositories
 * @version May 31, 2022, 8:52 pm UTC
*/

class UploadRepository extends BaseRepository
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
        return Upload::class;
    }
}
