<?php

namespace App\Http\Controllers;

use App\Models\PropertyType;
use App\Http\Requests\StorePropertyTypeRequest;
use App\Http\Requests\UpdatePropertyTypeRequest;
use PhpParser\Node\Stmt\PropertyProperty;
use Illuminate\Http\Request;

class PropertyTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function showPropertyType()
    {
        // Fetch all property types from the database
        $propertyTypes = PropertyType::get();
        
        // Pass data to the view
        return view('admin.property-types', compact('propertyTypes'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        PropertyType::updateOrCreate(
            ['id' => $request->id],
            ['name' => $request->name]
        );

        return redirect()->back()->with('success', 'Property Type saved successfully.');
    }

    public function destroy($id)
    {
        $propertyType = PropertyType::findOrFail($id);
        $propertyType->delete();

        return redirect()->back()->with('success', 'Property Type deleted successfully.');
    }
}
