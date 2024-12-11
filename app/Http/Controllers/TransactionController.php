<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function show()
    {
        $transactions = Transaction::all();
        return view('admin.transactions', compact('transactions'));
    }
    public function contactOwner(Request $request)
    {
        // Validate the form data
        $request->validate([
            'property_id' => 'required|exists:properties,id',
            'end_user_id' => 'required|exists:users,id',
        ]);
    
        // Create a new transaction
        $transaction = new Transaction();
        $transaction->property_id = $request->property_id;
        $transaction->end_user_id = $request->end_user_id;
        $transaction->date = now(); // You can store the current date, if needed
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
