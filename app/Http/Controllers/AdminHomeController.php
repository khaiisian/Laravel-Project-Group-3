<?php

namespace App\Http\Controllers;

use App\Models\Property;
use App\Models\Region;
use App\Models\Township;
use App\Models\Transaction;
use App\Models\User;
use App\Models\UserPost;
use Illuminate\Http\Request;

class AdminHomeController extends Controller
{
    //
    public function showDashboard()
    {
        $user_count = User::count();
        $post_count = UserPost::count();
        $tran_count = Transaction::count();
        $property_count = Property::count();
        $town_count = Township::count();
        $region_count = Region::count();

        return view('admin.admin_home', compact('user_count', 'post_count', 'tran_count', 'property_count', 'town_count', 'region_count'));
    }
}