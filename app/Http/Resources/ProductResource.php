<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
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
            'identify'      => $this->uuid,
            'name'          => $this->title,
            'image_url'     => env('APP_URL').$this->image,
            'price'         => $this->price,
            'description'   => $this->description,
            'category_id'   => $this->category_id
        ];
    }
}
