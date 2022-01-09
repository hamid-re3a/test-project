<?php


namespace Company\Repository;


use Company\Models\Province;
use Prettus\Repository\Eloquent\BaseRepository;

class ProvinceRepository  extends BaseRepository
{

    /**
     * @inheritDoc
     */
    public function model()
    {
        return Province::class;
    }
}
