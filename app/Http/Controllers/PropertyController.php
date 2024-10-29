<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Property;
use App\Models\PropertyType;
use App\Models\Region;
use App\Models\Township;
use Illuminate\Support\Facades\Session;

class PropertyController extends Controller
{
    public function showFilter()
    {
        $propertyTypes = PropertyType::all();
        $regions = Region::all();
        $forSaleOrRentOptions = [
            1 => 'For Rent',
            2 => 'For Sell'
        ];

        $selectedPropertyTypeId = Session::get('selectedPropertyTypeId');
        $selectedRegionId = Session::get('selectedRegionId');
        $selectedTownshipId = Session::get('selectedTownshipId');
        $forSaleOrRent = Session::get('forSaleOrRent');

        $townships = $selectedRegionId ? Township::where('region_id', $selectedRegionId)->get() : collect();
        $properties = Property::all();

        return view('user_side.user_home', compact('propertyTypes', 'regions', 'townships', 'properties', 'selectedPropertyTypeId', 'selectedRegionId', 'selectedTownshipId', 'forSaleOrRent', 'forSaleOrRentOptions'));
    }

    public function filterProperties(Request $request)
    {
        // Save user inputs in session
        Session::put('selectedPropertyTypeId', $request->property_type);
        Session::put('selectedRegionId', $request->region);
        Session::put('selectedTownshipId', $request->township);
        Session::put('forSaleOrRent', $request->for_sale_or_rent);

        // Retrieve inputs for filtering properties
        $selectedPropertyTypeId = $request->property_type;
        $selectedRegionId = $request->region;
        $selectedTownshipId = $request->township;
        $forSaleOrRent = $request->for_sale_or_rent;

        // Filter properties based on user inputs
        $properties = Property::where(function ($query) use ($selectedPropertyTypeId, $selectedTownshipId, $forSaleOrRent) {
            if ($selectedPropertyTypeId)
                $query->where('property_type_id', $selectedPropertyTypeId);
            if ($selectedTownshipId)
                $query->where('township_id', $selectedTownshipId);
            if ($forSaleOrRent)
                $query->where('selection_type_id', $forSaleOrRent);
        })->get();

        // Reload dependent data
        $propertyTypes = PropertyType::all();
        $regions = Region::all();
        $townships = Township::where('region_id', $selectedRegionId)->get();
        $forSaleOrRentOptions = [
            1 => 'For Rent',
            2 => 'For Sell'
        ];

        return view('user_side.user_home', compact('propertyTypes', 'regions', 'townships', 'properties', 'selectedPropertyTypeId', 'selectedRegionId', 'selectedTownshipId', 'forSaleOrRent', 'forSaleOrRentOptions'));
    }
    public function showPropertyDetails($id)
    {
        $property = Property::findOrFail($id);

        // Pass the property data to the detail view
        return view('user_side.detail', compact('property'));
    }
}