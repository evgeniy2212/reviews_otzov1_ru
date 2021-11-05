<?php

namespace App\Http\Controllers;

use App\Models\Country;

class RegionController extends Controller
{
    public function __invoke($country_id)
    {
        $regions = (new Country())->getRegionsByCountry($country_id);

        return response()->json($regions, 200);
    }
}
