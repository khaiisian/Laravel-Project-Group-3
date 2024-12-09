<?php
namespace App\Http\Controllers;

use App\Models\Property;
use Illuminate\Http\Request;
use App\Models\PropertyType;
use App\Models\HouseOwner;
use App\Models\Township;
use App\Models\SelectionType;
use Illuminate\Support\Facades\Auth;

class PropertyStoreController extends Controller
{

    public function show()
    {
        $ptType = PropertyType::all();
        $township = Township::all();
        $selectionType = SelectionType::all();
        return view('user_side.owner-post', compact('ptType', 'township', 'selectionType'));
    }
    // Method to handle form submission (POST request)
    public function store(Request $request)
    {
        // Validate incoming request
        $validated = $request->validate([
            'property_type_id' => 'required|exists:property_types,id',
            'township_id' => 'required|exists:townships,id',
            'selection_type_id' => 'required|exists:selection_types,id',
            'content' => 'required|string',
            'address' => 'required|string',
            'bedroom' => 'required|integer',
            'bathroom' => 'required|integer',
            'area' => 'required|integer',
            'price' => 'required|numeric',
            'status' => 'required|string',
            'description' => 'required|string',
            'room' => 'required|integer',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Handle image upload if exists
        $imagePath = null;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('images'), $imageName);
            $imagePath = 'images/' . $imageName;
        }

        // Create new Property record
        $property = new Property();
        $property->property_type_id = $validated['property_type_id'];
        $property->house_owner_id = Auth::id();
        $property->township_id = $validated['township_id'];
        $property->selection_type_id = $validated['selection_type_id'];
        $property->content = $validated['content'];
        $property->address = $validated['address'];
        $property->bedRoom = $validated['bedroom'];  // Ensure the name matches the database column
        $property->bathRoom = $validated['bathroom']; // Ensure the name matches the database column
        $property->area = $validated['area'];
        $property->price = $validated['price'];
        $property->status = $validated['status'];
        $property->description = $validated['description'];
        $property->room = $validated['room'];
        $property->image = $imagePath;
        $property->save(); // Save the new property to the database

        return redirect()->route('user_side.owner-post')->with('success', 'Property created successfully!');
    }
    
}
