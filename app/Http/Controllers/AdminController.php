<?php

namespace App\Http\Controllers;

use App\Models\Jobs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AdminController extends Controller
{
    public function admin(){
        return view('admin');
    }

    public function views(){
        $jobs = Jobs::all();

        return view('adminjoblisting', compact('jobs'));
    }

    public function destroy($id)
{
    $jobListing = Jobs::find($id);

    if (!$jobListing) {
        return redirect()->route('jobs.admin.listing')->with('error', 'Job listing not found.');
    }

    // You can add additional authorization logic here to check if the user is allowed to delete the job listing

    $jobListing->delete();

    return redirect()->route('jobs.admin.listing')->with('success', 'Job listing deleted successfully.');
}


    public function show(){
        
        return view('admindashbord');
    }

    public function store(Request $request)
    {
        // Validate the form data, including the image
        $validatedData = $request->validate([
            'job_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'job_title' => 'required|max:255',
            'job_location' => 'nullable|max:255',
            'published_date' => 'nullable|date',
            'salary' => 'nullable|numeric|min:0',
            'job_nature' => 'nullable|max:255',
            'job_description' => 'nullable|string',
            'responsibility' => 'nullable|string',
            'job_summary' => 'nullable|string',
            'company_details' => 'nullable|string',
            'qualifications' => 'nullable|string',
        ]);

        // Handle the image upload
        if ($request->hasFile('job_image')) {
            // Get the uploaded image file
            $image = $request->file('job_image');
            
            // Generate a unique name for the image
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            
            // Move the image to the storage directory (you may need to configure this)
            $image->move(public_path('images'), $imageName);

            // Save the image file name in the database
            $validatedData['job_image'] = $imageName;
        }

        // Create a new job instance
        $job = new Jobs($validatedData);

        // Associate the job with the currently logged-in user
        $job->user_id = Auth::user()->id;

        // Save the job to the database
        $job->save();

        // Redirect back with a success message
        return redirect()->route('jobs.create')->with('success', 'Job posted successfully');
    }
    public function create()
    {
        return view('adminpostjob'); 
    }


    
}

