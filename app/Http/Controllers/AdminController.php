<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Property; // Import the Property model

class AdminController extends Controller
{
    // Show the properties list page
    public function index()
    {
        $properties = Property::all(); // Fetch all properties
        return view('admin.properties', compact('properties'));
    }

    // Store a new property
    public function store(Request $request)
    {
        // Validate incoming request
        $request->validate([
            'property_type_id' => 'required',
            'house_owner_id' => 'required',
            'township_id' => 'required',
            'selection_type' => 'required',
            'content' => 'required',
            'address' => 'required',
            'bedroom' => 'required|integer',
            'bathroom' => 'required|integer',
            'area' => 'required|integer',
            'price' => 'required|numeric',
            'status' => 'required',
            'description' => 'required',
            'room' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Handle image upload if present
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('public/properties');
        } else {
            $imagePath = null;
        }

        // Create the property in the database
        Property::create([
            'property_type_id' => $request->property_type_id,
            'house_owner_id' => $request->house_owner_id,
            'township_id' => $request->township_id,
            'selection_type' => $request->selection_type,
            'content' => $request->content,
            'address' => $request->address,
            'bedroom' => $request->bedroom,
            'bathroom' => $request->bathroom,
            'area' => $request->area,
            'price' => $request->price,
            'status' => $request->status,
            'description' => $request->description,
            'room' => $request->room,
            'image' => $imagePath,
        ]);

        // Redirect back to the properties list with a success message
        return redirect()->route('admin.properties.index')->with('success', 'Property added successfully!');
    }
}
