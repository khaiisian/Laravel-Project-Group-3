<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->register_type,
        ]);


        if ($request->register_type === "renter") {
            $user->endUser()->create([
                'phNo' => $request->phnumber,
                'address' => $request->address,
            ]);
        } else if ($request->register_type === "owner") {
            $file = $request->file('nrc_img');
            $movedlocation = 'NRCImages';
            $file->move($movedlocation, $file->getClientOriginalName());
            $user->houseOwner()->create([
                'address' => $request->address,
                'phNo' => $request->phnumber,
                'fbLink' => $request->fblink,
                'NRC' => $request->nrc_no,
                'NRCImage' => $file->getClientOriginalName(),
            ]);
        }



        // 'user_id', 'address', 'phNo', 'fbLink', 'profile', 'NRC', 'NRCImage'

        // $user->houseOwner()->create([
        //     'address'=>$request->address,
        //     'phNo'=>$request->phN
        // ]);



        event(new Registered($user));

        Auth::login($user);

        if ($user->role === 'renter') {
            return redirect(RouteServiceProvider::USERHOME);
        } elseif ($user->role === 'owner') {
            return redirect(RouteServiceProvider::USERHOME);
    }

        // return redirect(RouteServiceProvider::OWNERHOME);
    }
}