<?php


namespace Company\Repository;


use Prettus\Repository\Eloquent\BaseRepository;
use Company\Models\Company;

class CompanyRepository  extends BaseRepository
{

    /**
     * @inheritDoc
     */
    public function model()
    {
        return Company::class;
    }
}
