<?php

namespace App\Http\Controllers;

use App\Models\PropertyType;
use App\Http\Requests\StorePropertyTypeRequest;
use App\Http\Requests\UpdatePropertyTypeRequest;
use PhpParser\Node\Stmt\PropertyProperty;

class PropertyTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function showPropertyType()
    {
        // Fetch all property types from the database
        $propertyTypes = PropertyType::all();
        
        // Pass data to the view
        return view('admin.property-types', compact('propertyTypes'));
    }
}
