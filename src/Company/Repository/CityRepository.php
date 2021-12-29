<?php


namespace Company\Repository;


use Company\Models\City;
use Prettus\Repository\Eloquent\BaseRepository;

class CityRepository  extends BaseRepository
{

    /**
     * @inheritDoc
     */
    public function model()
    {
        return City::class;
    }
}
