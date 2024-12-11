<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Property;
use App\Models\PropertyType;
use App\Models\Region;
use App\Models\Township;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

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

        return view('user_side.user_home', compact(
            'propertyTypes',
            'regions',
            'townships',
            'properties',
            'selectedPropertyTypeId',
            'selectedRegionId',
            'selectedTownshipId',
            'forSaleOrRent',
            'forSaleOrRentOptions'
        ));
    }

    public function filterProperties(Request $request)
    {
        Session::put('selectedPropertyTypeId', $request->property_type);
        Session::put('selectedRegionId', $request->region);
        Session::put('selectedTownshipId', $request->township);
        Session::put('forSaleOrRent', $request->for_sale_or_rent);

        $selectedPropertyTypeId = $request->property_type;
        $selectedRegionId = $request->region;
        $selectedTownshipId = $request->township;
        $forSaleOrRent = $request->for_sale_or_rent;

        $properties = Property::where(function ($query) use ($selectedPropertyTypeId, $selectedTownshipId, $forSaleOrRent) {
            if ($selectedPropertyTypeId)
                $query->where('property_type_id', $selectedPropertyTypeId);
            if ($selectedTownshipId)
                $query->where('township_id', $selectedTownshipId);
            if ($forSaleOrRent)
                $query->where('selection_type_id', $forSaleOrRent);
        })->get();

        $propertyTypes = PropertyType::all();
        $regions = Region::all();
        $townships = Township::where('region_id', $selectedRegionId)->get();
        $forSaleOrRentOptions = [
            1 => 'For Rent',
            2 => 'For Sell'
        ];

        return view('user_side.user_home', compact(
            'propertyTypes',
            'regions',
            'townships',
            'properties',
            'selectedPropertyTypeId',
            'selectedRegionId',
            'selectedTownshipId',
            'forSaleOrRent',
            'forSaleOrRentOptions'
        ));
    }

    public function showPropertyDetails($id)
    {
        $property = Property::findOrFail($id);

        return view('user_side.detail', compact('property'));
    }

    public function create()
    {
        $user = Auth::user();

        if ($user->role === 2) {
            return view('property.create');
        } elseif ($user->role === 1) {
            return redirect()->route('userpost');
        } else {
            return abort(403, 'Unauthorized action.');
        }
    }


    public function goToSelectionType(Request $request)
    {
        $selectionTypeId = $request->get('id');

        $properties = Property::with(['houseOwner.user', 'township', 'propertyType', 'selectionType'])
            ->when($selectionTypeId, function ($query) use ($selectionTypeId) {
                $query->where('selection_type_id', $selectionTypeId);
            })
            ->get();

        return view('user_side.selection-type', compact('properties', 'selectionTypeId'));
    }
    public function showProperty()
    {
        $properties = Property::with(['propertyType', 'houseOwner', 'township', 'selectionType'])->get();
        return view('admin.properties', compact('properties'));
    }

}
