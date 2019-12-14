<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Resources\SearchCollection;
use App\Http\Resources\FilterResource;

class ApiController extends Controller
{
    /**
     * Create the search function. This calls the getEntries from the Entries model and returns the json response of the results.
     *
     * @return json
     */
    public function handleSearch(Request $request){
        $availability = $request->get("availability");
        $type = $request->get("type");
        $location = $request->get("location");
        $sqMeters = $request->get("sqMeters");
        $price = $request->get("price");

        $results = \App\Entries::getEntries($availability, $type, $location, $sqMeters, $price)->paginate(5);

        $formatted = new SearchCollection($results);
        return response()->json($formatted);
    }

    public function handleFilters(){
        $selects = ['id','name'];

        $availability = FilterResource::collection(\App\Availability::select($selects)->get());
        $type = FilterResource::collection(\App\Type::select($selects)->get());
        $locations = FilterResource::collection(\App\Locations::select($selects)->get());

        $availabilityFilters = [];
        foreach ($availability as $value) {
            $availabilityFilters[$value->name] = $value->id;
        }
        $typeFilters = [];
        foreach ($type as $value) {
            $typeFilters[$value->name] = $value->id;
        }
        $locationsFilters = [];
        foreach ($locations as $value) {
            $locationsFilters[$value->name] = $value->id;
        }

        $filters =[
            [
                "id" => 'availability',
                "label" => 'Availability',
                "type" => 'select',
                "options" => $availabilityFilters,
            ],
            [
                "id" => 'type',
                "label" => 'Type',
                "type" => 'select',
                "options" => $typeFilters,
            ],
            [
                "id" => 'locations',
                "label" => 'Locations',
                "type" => 'select',
                "options" => $locationsFilters,
            ],
            [
                "id" => 'price',
                "label" => 'Price',
                "type" => 'range',
                "options" => [
                    "min"=> 10,
                    "max"=> 10000000
                ],
            ],
            [
                "id" => 'sqMeters',
                "label" => 'Square Meters',
                "type" => 'range',
                "options" => [
                    "min"=> 10,
                    "max"=> 500
                ]
            ]
        ];

        return response()->json($filters);
    }
}
