<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function show()
{
    // Eager load the 'enduser' and 'user' relationships
    $transactions = Transaction::with(['enduser.user'])->get();
    return view('admin.transactions', compact('transactions'));
}

    public function contactOwner(Request $request)
{
    $user = auth()->user();  // Get the authenticated user
    $end_user = $user->endUser;  // Assuming 'endUser' is the relationship to the 'end_users' table
    $end_user_id = $end_user->id;  // Get the id of the related 'end_user'

    // Validate the form data
    $request->validate([
        'property_id' => 'required|exists:properties,id',
        'end_user_id' => 'required|exists:end_users,id',  // Make sure 'end_user_id' exists in 'end_users'
    ]);

    // Create a new transaction
    $transaction = new Transaction();
    $transaction->property_id = $request->property_id;
    $transaction->end_user_id = $end_user_id;  // Use the correct 'end_user_id'
    $transaction->date = now();  // Store the current date
    $transaction->save();

    // Optionally: Add any notification or email logic to inform the house owner.
    
    // Redirect back to the property details page with a success message
    return redirect()->route('property.details', ['id' => $request->property_id])
        ->with('success', 'Your interest in the property has been recorded.');
}

    public function goToNotiPage(){
        $transactions = Transaction::with(['enduser.user'])->get();

        return view('user_side.owner-noti', compact('transactions'));   
    }
    
}
