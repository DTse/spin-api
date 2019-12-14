<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class SearchResource extends Resource
{

    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'availability' => $this->availability()->first()->name,
            'type' => $this->type()->first()->name,
            'location' => $this->locations()->first()->name,
            'sqMeters' => $this->sqMeters,
            'price' => $this->price,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }

}
