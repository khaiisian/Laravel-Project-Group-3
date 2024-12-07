<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Property;
use App\Models\PropertyType;
use App\Models\Region;
use App\Models\Township;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use App\Models\PropertyImage;
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
    public function create()
    {
        // Check user role
        $user = Auth::user();

        if ($user->role === 2) { // Owner
            return view('property.create'); // Show create property form
        } elseif ($user->role === 1) { // Renter
            return redirect()->route('userpost'); // Redirect to user posts
        } else {
            return abort(403, 'Unauthorized action.');
        }
    }

    public function store(Request $request)
    {
        // Validate the incoming request
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
            'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Image validation
        ]);

        // Create property
        $property = Property::create([
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
        ]);

        // Handle image uploads
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $imageName = time() . '_' . $image->getClientOriginalName();
                $image->move(public_path('images'), $imageName);
                
                // Save image in PropertyImage model
                PropertyImage::create([
                    'property_id' => $property->id,
                    'image_path' => 'images/' . $imageName,
                ]);
            }
        }

        return redirect()->route('user_side.create')->with('success', 'Property created successfully!');
    }

    public function userPost()
    {
        // Logic for user posts
        return view('property.userpost'); // Display user posts
    }

    public function userFilter()
    {
        // Logic for filtering properties
        return view('user_side.userfilter'); // Display filtered properties
    }
    public function showProperties()
    {
        // Retrieve all properties
        $properties = Property::get();  // eager loading the relationships

        // Pass the properties to the view
        return view('admin.properties', compact('properties'));
    }
    public function goToSell(Request $request){
        return view('user_side.to_sell');
    }
}