<?php

// TownshipController.php
namespace App\Http\Controllers;

use App\Models\Township;
use App\Models\Region;
use App\Models\PropertyType;
use Illuminate\Http\Request;

class TownshipController extends Controller
{
    public function showTownship($id) {
        session(['selectedRegionId' => $id]); // Store selected region ID in session
        $regions = Region::all();
        $propertyTypes = PropertyType::all(); // Include property types to persist data on selection
        $township = Township::where('region_id', '=', $id)->get(); // Fetch townships for the selected region
        $selectedPropertyTypeId = session('selectedPropertyTypeId', null); // Get selected property type from session

        return view('user_side.user_home', compact('regions', 'propertyTypes', 'township', 'id as selectedRegionId', 'selectedPropertyTypeId'));
    }
}

