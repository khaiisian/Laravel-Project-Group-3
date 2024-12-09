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
}

    
