<?php

namespace App\Http\Controllers;

use App\Models\Jobs;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
       
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $jobs = Jobs::all();
        $fulltime_jobs = Jobs::where('job_nature',"full_time")->get();
        $parttime_jobs = Jobs::where('job_nature',"part_time")->get();

        return view('welcome',compact('jobs','fulltime_jobs','parttime_jobs'));

    }
}
