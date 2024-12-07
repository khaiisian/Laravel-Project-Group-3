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
