<?php

namespace App\Http\Controllers;

use App\Models\Property;
use Illuminate\Http\Request;
use App\Models\PropertyType;
use App\Models\HouseOwner;
use App\Models\Township;
use App\Models\SelectionType;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;


class PropertyStoreController extends Controller
{

    public function show()
    {
        $ptType = PropertyType::all();
        $township = Township::all();
        $selectionType = SelectionType::all();
        return view('user_side.owner-post', compact('ptType', 'township', 'selectionType'));
    }
    public function store(Request $request)
    {
        // Get the logged-in user
        $user = Auth::user();
    
        // Check if the user has an associated house owner, create one if not
        $houseOwner = $user->houseOwner; // This fetches the HouseOwner for the logged-in user
    
        if (!$houseOwner) {
            // If no house owner exists, create a new house owner record
            $houseOwner = HouseOwner::create([
                'user_id' => $user->id,
                'address' => $request->address,  // Use the request data or default values
                'phNo' => $request->phNo,
                'fbLink' => $request->fbLink,
                'profile' => $request->profile,
                'NRC' => $request->NRC,
                'NRCImage' => $request->NRCImage,
            ]);
        }
    
        // Create a new property record and associate it with the house owner
        $property = new Property();
        $property->house_owner_id = $houseOwner->id;  // Set the house_owner_id correctly
        $property->property_type_id = $request->property_type_id;
        $property->township_id = $request->township_id;
        $property->selection_type_id = $request->selection_type_id;
        $property->content = $request->content;
        $property->address = $request->address;
        $property->bedroom = $request->bedroom;
        $property->bathroom = $request->bathroom;
        $property->area = $request->area;
        $property->price = $request->price;
        $property->status = 'active';  // Set the default status
        $property->description = $request->description;
        $property->room = $request->room;
    
        if ($request->hasFile('image')) {
            $request->validate([
                'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);
        
            $images = $request->file('image');
            
            // Define the image name
            $imageName = 'property_' . time() . '.' . $images->getClientOriginalExtension();
        
            // Move the image to the public/images directory
            $images->move(public_path('images'), $imageName);
        
            // Save the image name in the database
            $property->image = $imageName;
        
            Log::info('Image stored successfully in public/images: ' . $property->image);
        }
        
        
        
        if ($property->save()) {
            Log::info('Property saved:', $property->toArray());
        } else {
            Log::error('Property save failed');
        }

        // Redirect or return response
        return redirect()->route('user_side.owner-post')->with('success', 'Property added successfully');
    }
    
    
    
    
    
    
    
}
