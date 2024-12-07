<?php

namespace App\Http\Controllers;

use App\Models\UserPost;
use App\Http\Requests\StoreUserPostRequest;
use App\Http\Requests\UpdateUserPostRequest;
use App\Models\Region;
use App\Models\PropertyType;
use App\Models\Township;
use App\Models\EndUser;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class UserPostController extends Controller
{
    public function create()
    {
        $regions = Region::all();
        $townships = Township::all();
        $propertyTypes = PropertyType::all();
        $userPost = new UserPost(); // Default empty data for form

        return view('user_side.userpost', compact('regions', 'townships', 'propertyTypes', 'userPost'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'region' => 'required|exists:regions,id',
            'township' => 'required|exists:townships,id',
            'for_sale_or_rent' => 'required|in:rent,sell',
            'content' => 'required|string|max:255',
            'requirement' => 'required|string|max:255',
        ]);

        $userPost = new UserPost();
        $userPost->end_user_id = Auth::id(); // Set end_user_id to the logged-in user's ID
        $userPost->region_id = $validated['region'];
        $userPost->township_id = $validated['township'];
        $userPost->selection_type_id = $validated['for_sale_or_rent'] == 'rent' ? 1 : 2; // Adjust this based on your selection types
        $userPost->content = $validated['content']; // Set default or based on your use case
        $userPost->requirement = $validated['requirement'];
        $userPost->status = 'Pending'; // Default status
        $userPost->save();

        return redirect()->back()->with('success', 'Post submitted successfully!');
    }
    public function show()
    {
        // Step 1: Get all posts data with related information
        $posts = UserPost::with([
            'enduser.user',        // Fetch user data through enduser relationship
            'region',              // Fetch region data
            'township'             // Fetch township data
        ])->get();

        // Step 2: Return the data to the view
        return view('user_side.view', compact('posts'));
    }

}
