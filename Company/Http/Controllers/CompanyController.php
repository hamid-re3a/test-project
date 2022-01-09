<?php

namespace Company\Http\Controllers;

use Company\Http\Requests\StoreCompanyRequest;
use Company\Http\Requests\UpdateCompanyRequest;
use Company\Http\Requests\UpdateProvinceRequest;
use Company\Http\Resources\CompanyResource;
use Company\Repository\CompanyRepository;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class CompanyController extends Controller
{
    /**
     * @var CompanyRepository
     */
    private $companyRepository;

    public function __construct(CompanyRepository $companyRepository)
    {
        $this->companyRepository = $companyRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @group
     * Company > Company
     */
    public function index()
    {
        return api()->success('success', CompanyResource::collection($this->companyRepository->all()));
    }


    /**
     * Store a newly created resource in storage.
     * @group
     * Company > Company
     * @param StoreCompanyRequest $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(StoreCompanyRequest $request)
    {
        return api()->success('success',CompanyResource::make($this->companyRepository->create($request->validated())));
    }

    /**
     * Display the specified resource.
     * @group
     * Company > Company
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        return api()->success('success',CompanyResource::make($this->companyRepository->find($id)));
    }


    /**
     * Update the specified resource in storage.
     * @group
     * Company > Company
     * @param UpdateCompanyRequest $request
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(UpdateCompanyRequest $request, $id)
    {
        return api()->success('success',CompanyResource::make($this->companyRepository->update($request->validated(),$id)));
    }

    /**
     * Remove the specified resource from storage.
     * @group
     * Company > Company
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        $this->companyRepository->delete($id);
        return api()->success('success');
    }
}
