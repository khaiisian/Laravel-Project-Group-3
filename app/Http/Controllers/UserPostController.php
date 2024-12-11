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
        // Validate incoming data
        $request->validate([
            'region' => 'required|integer',  // Adjust validation rules as needed
            'township' => 'required|integer',
            'for_sale_or_rent' => 'required|in:sell,rent', // Ensure the value is either 'sell' or 'rent'
            'content' => 'nullable|string',  // Adjust validation as per your needs
            'requirement' => 'nullable|string',  // Adjust validation as per your needs
        ]);

        // Get the logged-in user
        $user = Auth::user();
        $end_user_id = $user->enduser;

        // Initialize the UserPost model
        $userPost = new UserPost();
        $userPost->end_user_id = $end_user_id->id; // Set the end_user_id to the logged-in user's ID

        // Assign other input values
        $userPost->region_id = $request->input('region');
        $userPost->township_id = $request->input('township');

        // Map the 'for_sale_or_rent' string to an integer ID
        $selectionType = $request->input('for_sale_or_rent');
        $selectionTypeId = null;

        if ($selectionType === 'sell') {
            $selectionTypeId = 1;  // Set this ID to the actual ID for 'sell' from your selection_types table
        } elseif ($selectionType === 'rent') {
            $selectionTypeId = 2;  // Set this ID to the actual ID for 'rent' from your selection_types table
        }

        // Set the selection_type_id to the corresponding ID
        $userPost->selection_type_id = $selectionTypeId;

        // Set other fields
        $userPost->content = $request->input('content');  // Set default content or use input
        $userPost->requirement = $request->input('requirement');  // Set default requirement or use input
        $userPost->status = 'Pending';  // Default status

        // Save the new post
        $userPost->save();

        // Redirect back with success message
        return redirect()->back()->with('success', 'Post submitted successfully!');
    }

    // Fetch user information by end_user_id
    private function getUserInfo($end_user_id)
    {
        $endUser = EndUser::with('user')->find($end_user_id);
        return $endUser ? $endUser : null;
    }

    // Fetch region name by region_id
    private function getRegionName($region_id)
    {
        $region = Region::find($region_id);
        return $region ? $region->name : 'Region not available';
    }

    // Fetch township name by township_id
    private function getTownshipName($township_id)
    {
        $township = Township::find($township_id);
        return $township ? $township->name : 'Township not available';
    }

    // Main function to display posts
    public function show()
    {
        // Get all posts
        $posts = UserPost::all();

        // Process each post
        foreach ($posts as $post) {
            // Attach user info
            $post->user_info = $this->getUserInfo($post->end_user_id);

            // Attach region name
            $post->region_name = $this->getRegionName($post->region_id);

            // Attach township name
            $post->township_name = $this->getTownshipName($post->township_id);
        }

        // Return to the view
        return view('user_side.view', compact('posts'));
    }

    
}
