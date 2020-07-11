<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class ProductsCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'data' => $this->collection->map(function($element){
                return [ 

                    "title" => $element->title,
                    "id" => $element->id,
                    "humanPrice" => "$".$element->price,
                    "numberPrice" => $element->price,
                    "image" => $element->image_url,
                    "description" => $element->description
                ];
            })
        ];
    }
}
