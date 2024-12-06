<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use App\Http\Requests\StoreFeedbackRequest;
use App\Http\Requests\UpdateFeedbackRequest;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Get all other data except the image
        $data = $request->only(['title', 'about', 'rate']);
    

    
        // Check if user is authenticated
        if (!auth()->check()) {
            return redirect()->route('login')->with('error', 'Please log in to submit feedback.');
        }
    
        // Add the user_id to the data
        $data['user_id'] = auth()->id();
    
        try {
            // Insert the feedback data into the database
            Feedback::create($data);
    
            // Redirect with success message
            return redirect()->back()->with('success', 'Feedback submitted successfully!');
        } catch (\Exception $e) {
            // Handle errors and return an error message
            return redirect()->back()->with('error', 'Error submitting feedback: ' . $e->getMessage());
        }
    }
    


    


    /**
     * Display the specified resource.
     */
    public function show(Feedback $feedback)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Feedback $feedback)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateFeedbackRequest $request, Feedback $feedback)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Feedback $feedback)
    {
        //
    }
}
