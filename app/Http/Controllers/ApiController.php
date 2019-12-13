<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Resources\SearchCollection;

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

        $availabilityFilters = \App\Availability::select($selects)->get();
        $typeFilters = \App\Type::select($selects)->get();
        $locationsFilters = \App\Locations::select($selects)->get();

        dd($availabilityFilters);
    }
}
