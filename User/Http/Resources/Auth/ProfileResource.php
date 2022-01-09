<?php

namespace User\Http\Resources\Auth;

use \ApiResponse\ApiResponse;
use Illuminate\Http\Resources\Json\JsonResource;

class ProfileResource extends JsonResource
{
      protected $withoutFields = [
          'roles'
      ];

    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return $this->filterFields([
            'id' => $this->id,
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'full_name' => $this->full_name,
            'email' => $this->email,
            'roles' => $this->roles,
            'username' => $this->username,
            'phone_number' => $this->phone_number,
            'created_at' => $this->created_at->timestamp,
        ]);
    }

    public function with($request)
    {
        return api()->status();
    }

    /**
     * Set the keys that are supposed to be filtered out.
     *
     * @param array $fields
     * @return $this
     */
    public function hide(array $fields)
    {
        $this->withoutFields = $fields;

        return $this;
    }

    /**
     * Remove the filtered keys.
     *
     * @param $array
     * @return array
     */
    protected function filterFields($array)
    {
        return collect($array)->forget($this->withoutFields)->toArray();
    }
}
