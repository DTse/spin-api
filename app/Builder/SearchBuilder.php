<?php

namespace App\Builder;

use Illuminate\Database\Eloquent\Builder;
use Carbon\Carbon;

/**
* Create a custom Query Builder to create the search query.
*
* @return Builder
*/
class SearchBuilder extends Builder
{
    public function apiSearch($availability, $type, $location, $sqMeters, $price){

        $this->when($availability, function ($query) use ($availability) {
            return $query->where('availability', '=', $availability);

        })->when($location, function ($query) use ($location) {
            if(!is_array($location)) return $query->where('location', '=' ,$location);
            return $query->whereIn('location',  $location);

        })->when($sqMeters, function ($query) use ($sqMeters) {
            foreach ($sqMeters as $value) {
                return $query->orWhereBetween('sqMeters', explode(',',$value));
            }

        })->when($price, function ($query) use ($price) {
            foreach ($price as $value) {
                return $query->orWhereBetween('price', explode(',',$value));
            }


        })->when($type, function ($query) use ($type) {
            return $query->whereHas('type', function ($queryH) use($type) {
                if(!is_array($type)) return $queryH->where('type_id', '=' ,$type);
                return $queryH->whereIn('type_id', $type);
            });

        });

        return $this;
    }
}