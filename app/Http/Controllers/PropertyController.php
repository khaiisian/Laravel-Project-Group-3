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

    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'property_type_id' => 'required|exists:property_types,id',
            'house_owner_id' => 'required|exists:house_owners,id',
            'township_id' => 'required|exists:townships,id',
            'selection_type_id' => 'required|exists:selection_types,id',
            'content' => 'required|string',
            'address' => 'required|string',
            'bedRoom' => 'required|integer',
            'bathRoom' => 'required|integer',
            'area' => 'required|integer',
            'price' => 'required|numeric',
            'status' => 'required|string',
            'description' => 'required|string',
            'room' => 'required|integer',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Handle image upload
        $imagePath = null;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('images'), $imageName);
            $imagePath = 'images/' . $imageName;
        }

        // Create a new property record
        Property::create([
            'property_type_id' => $request->property_type_id,
            'house_owner_id' => $request->house_owner_id,
            'township_id' => $request->township_id,
            'selection_type_id' => $request->selection_type_id,
            'content' => $request->content,
            'address' => $request->address,
            'bedRoom' => $request->bedRoom,
            'bathRoom' => $request->bathRoom,
            'area' => $request->area,
            'price' => $request->price,
            'status' => $request->status,
            'description' => $request->description,
            'room' => $request->room,
            'image' => $imagePath,
        ]);

        // Redirect with success message
        return redirect()->route('owner.create')->with('success', 'Property created successfully!');
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

}
