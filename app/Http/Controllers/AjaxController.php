<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AjaxController extends Controller
{
    //
    public function getRegisterInfo(Request $request)
    {
        $register_type = $request->register_type;

        $renter = view('auth.renter_info')->render();
        $owner = view('auth.owner_info')->render();


        if ($register_type == 1) {
            $msg = $renter;
        } else if ($register_type == 2) {
            $msg = $owner;
        }

        return response()->json(array('msg' => $msg), 200);

    }
}