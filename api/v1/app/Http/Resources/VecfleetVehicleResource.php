<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class VecfleetVehicleResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        // return parent::toArray($request);
        return [
            'type' => $this->type,
            'wheels' => $this->name,
            'brand' => $this->email,
            'chassis' => $this->chassis,
            'km_traveled' => $this->km_traveled
        ];
    }
}
