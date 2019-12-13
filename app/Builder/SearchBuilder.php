<?php

namespace App\Builder;

use Illuminate\Database\Eloquent\Builder;
use Carbon\Carbon;

class SearchBuilder extends Builder
{
    public function apiSearch($availability, $type, $location, $sqMeters, $price){

        $this->when($availability, function ($query) use ($availability) {
            return $query->where('availability', '=', $availability);

        })->when($location, function ($query) use ($location) {
            if(!is_array($location)) return $query->where('location', '=' ,$location);
            return $query->whereIn('location',  $location);

        })->when($sqMeters, function ($query) use ($sqMeters) {
            return $query->whereBetween('sqMeters',  $sqMeters);

        })->when($price, function ($query) use ($price) {
            return $query->whereBetween('price',  $price);

        })->when($type, function ($query) use ($type) {
            return $query->whereHas('type', function ($queryH) use($type) {
                if(!is_array($type)) return $queryH->where('type_id', '=' ,$type);
                return $queryH->whereIn('type_id', $type);
            });

        });

        return $this;
    }
}