<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\UserPost;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class UserProfileController extends Controller
{
    public function showProfileAndPosts()
    {
        // Fetch user profile along with posts and related data
        $user = $this->getUserProfile();
        $userPosts = $this->getUserPosts();

        return view('user_side.profile', compact('user', 'userPosts'));
    }

    // Private method for fetching user profile
    private function getUserProfile()
    {
        return User::with('endUser')->findOrFail(auth()->id());
    }

    // Private method for fetching user posts and related data
    private function getUserPosts()
    {
        return User::with(['endUser.userPosts.region', 'endUser.userPosts.township', 'endUser.userPosts.selectionType'])
            ->findOrFail(auth()->id())
            ->endUser->userPosts; // Access user posts directly from 'endUser'
    }
    public function delete($postId)
    {
        // Find the post by ID
        $userPost = UserPost::find($postId);
        $userPost->delete();
        return redirect()->back()->with('success', 'Post deleted successfully.');
    }

}
