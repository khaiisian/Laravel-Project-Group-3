<?php

namespace App\Http\Controllers;

use App\Models\Region;
use App\Models\PropertyType;
use Illuminate\Http\Request;

class RegionController extends Controller
{
    public function showRegionList(Request $request) {
        $regions = Region::all();
        $propertyTypes = PropertyType::all(); // Include property types for initial load
        $township = []; // Empty array initially, since no region is selected

        // Retrieve selected region from session or query
        $selectedRegionId = session('selectedRegionId', null);
        // Retrieve selected property type from query or session
        $selectedPropertyTypeId = $request->query('propertyTypeId', session('selectedPropertyTypeId', null)); 

        // If there's a selected property type ID, store it in the session
        if ($selectedPropertyTypeId) {
            session(['selectedPropertyTypeId' => $selectedPropertyTypeId]);
        }

        return view('user_side.user_home', compact('regions', 'propertyTypes', 'township', 'selectedRegionId', 'selectedPropertyTypeId'));
    }
}

