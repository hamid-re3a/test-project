<?php

namespace Company\Http\Controllers;

use Company\Http\Requests\StoreProvinceRequest;
use Company\Http\Requests\UpdateProvinceRequest;
use Company\Http\Resources\ProvinceResource;
use Company\Repository\ProvinceRepository;
use Illuminate\Routing\Controller;

class ProvinceController extends Controller
{
    /**
     * @var ProvinceRepository
     */
    private $provinceRepository;

    public function __construct(ProvinceRepository $provinceRepository)
    {
        $this->provinceRepository = $provinceRepository;
    }

    /**
     * Display a listing of the resource.
     * @group
     * Company > Province
     */
    public function index()
    {
        return api()->success('success', ProvinceResource::collection($this->provinceRepository->all()));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @group
     * Company > Province
     * @param StoreProvinceRequest $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(StoreProvinceRequest $request)
    {
        return api()->success('success',ProvinceResource::make($this->provinceRepository->create($request->validated())));
    }

    /**
     * Display the specified resource.
     * @group
     * Company > Province
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        return api()->success('success',ProvinceResource::make($this->provinceRepository->find($id)));
    }

    /**
     * Update the specified resource in storage.
     * @group
     * Company > Province
     * @param UpdateProvinceRequest $request
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(UpdateProvinceRequest $request, $id)
    {
        return api()->success('success',ProvinceResource::make($this->provinceRepository->update($request->validated(),$id)));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @group
     * Company > Province
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        $this->provinceRepository->delete($id);
        return api()->success('success');
    }
}
