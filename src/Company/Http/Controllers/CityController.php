<?php

namespace Company\Http\Controllers;

use Company\Http\Requests\StoreCityRequest;
use Company\Http\Requests\UpdateCityRequest;
use Company\Http\Resources\CityResource;
use Company\Repository\CityRepository;
use Illuminate\Routing\Controller;

class CityController extends Controller
{

    /**
     * @var CityRepository
     */
    private $cityRepository;

    public function __construct(CityRepository $cityRepository)
    {
        $this->cityRepository = $cityRepository;
    }

    /**
     * Display a listing of the resource.
     * @group
     * Company > City
     */
    public function index()
    {
        return api()->success('success', CityResource::collection($this->cityRepository->all()));
    }


    /**
     * Store a newly created resource in storage.
     * @group
     * Company > City
     * @param StoreCityRequest $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(StoreCityRequest $request)
    {
        return api()->success('success',CityResource::make($this->cityRepository->create($request->validated())));
    }

    /**
     * Display the specified resource.
     * @group
     * Company > City
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        return api()->success('success',CityResource::make($this->cityRepository->find($id)));
    }


    /**
     * Update the specified resource in storage.
     * @group
     * Company > City
     *
     * @param UpdateCityRequest $request
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(UpdateCityRequest $request, $id)
    {
        return api()->success('success',CityResource::make($this->cityRepository->update($request->validated(),$id)));
    }

    /**
     * Remove the specified resource from storage.
     * @group
     * Company > City
     *
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        $this->cityRepository->delete($id);
        return api()->success('success');
    }
}
