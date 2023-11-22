<?php

namespace App\Http\Controllers;

use App\Models\Jobs;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class JobController extends Controller
{

    public function filter(Request $request)
    {

        $jobs = Jobs::query();
        $selectedJobNatures = $request->input('Job_nature', []);
        if(count($selectedJobNatures) > 0){
            $jobs = $jobs->whereIn('Job_nature', $selectedJobNatures);
        }
        
        if ($request->has('min_salary') && $request->input('min_salary') !== null) {
            $minSalary = $request->input('min_salary');
            $jobs->where('salary', '>=', $minSalary);
        }

        // Filter by maximum salary
        if ($request->has('max_salary') && $request->input('max_salary') !== null) {
            $maxSalary = $request->input('max_salary');
            $jobs->where('salary', '<=', $maxSalary);
        }

        // Filter by location
        if ($request->has('job_location') && $request->input('job_location') !== null) {
            $location = $request->input('job_location');
            $jobs->where('job_location', $location);
        }
        $results = $jobs->get();
        $filteredJobs = $results;
 
        return response()->json(["success" => true, "filteredJobs" => $filteredJobs]);
    }
    public function index(Request $request)
    {

        $jobs = Jobs::all();
        $fulltime_jobs = Jobs::where('job_nature', "Full_Time")->get();
        $parttime_jobs = Jobs::where('job_nature', "Part_Time")->get();

        return view('joblisting', compact('jobs', 'fulltime_jobs', 'parttime_jobs'));

    }


    public function show($id = null)
    {


        if (isset($id)) {
            $job = Jobs::find($id);

            return view('jobdetails', compact('job'));

        }


    }

}