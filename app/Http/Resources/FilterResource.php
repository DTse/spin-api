<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class FilterResource extends Resource
{

    public function toArray($request)
    {
        return [
            $this->name => $this->id
        ];
    }

}
