<?php

namespace Company\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use User\Http\Resources\User\ProfileDetailsResource;

class CompanyResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id'=>$this->id,
            'name'=>$this->name,
            'phone_number'=>$this->phone_number,
            'city'=>$this->city->name,
            'province'=>$this->city->province->name,
        ];
    }
}
