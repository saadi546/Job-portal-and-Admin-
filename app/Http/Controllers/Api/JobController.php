<?php

namespace App\Http\Controllers\Api;

use App\Models\Jobs;
use Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class JobController extends Controller
{
    public function index()
    {
        $jobs = Jobs::all();
        // $fulltime_jobs = Jobs::where('job_nature',"full_time")->get();
        // $parttime_jobs = Jobs::where('job_nature',"part_time")->get();

        return response()->json(["all_jobs"=>$jobs],200);

    }

    public function form(){
        return response()->json();
    }

    public function jobdetails($id){
        $jobs = Jobs::find($id);
        if(!$jobs){
            return response()->json(["Data Not Found"],200);
        }
        return response()->json(['data'=>$jobs]);
    }

    public function store(Request $request)
    {
        // Validate the form data, including the image
        $validatedData = Validator::make($request->all(),[
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

        if($validatedData->fails()){
            return response()->json(['Request Failed' => $validatedData->errors()],422);
        }

        $input=new Jobs();
        $input-> job_image = $request->job_image;
        $input-> job_title = $request->job_title;
        $input->job_location = $request->job_location;
        $input->published_date = $request->published_date;
        $input->salary = $request->salary;
        $input->job_nature = $request->job_nature;
        $input->job_description = $request->job_description;
        $input->responsibility = $request->responsibility;
        $input->job_summary = $request->job_summary;
        $input->company_details = $request->company_details;
        $input->qualifications = $request->qualifications;

        $input->save();

        return response()->json(['Job Posted Succesfully'],200);

      
        
    }
}
