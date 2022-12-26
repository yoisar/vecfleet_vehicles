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
            'type_id' => $this->type_id,
            'wheels' => $this->wheels,
            'brand_id' => $this->brand_id,
            'chassis' => $this->chassis,
            'km_traveled' => $this->km_traveled,
            'model' => $this->model,
            'patent' => $this->patent
        ];
    }
}
