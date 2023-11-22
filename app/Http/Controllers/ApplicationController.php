<?php

namespace App\Http\Controllers;

use App\Models\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ApplicationController extends Controller
{
    public function index()
{
    $applications = Application::all();
    return view('adminapplication', ['applications' => $applications]);
}

    public function download($path){

        
        $file_path=base64_decode(urldecode($path));
        return Storage::download($file_path);

        
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'portfolio_link' => 'required|string',
            'resume' => 'required|mimes:pdf,doc,docx,img,png', // Update the field name to 'resume'
            'cover_letter' => 'required|string'
        ]);
    
        $resumePath = $request->file('resume')->store('resumes');
    
        Application::create([
            'job_id' => $request->input('job_id'),
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'portfolio_link' => $request->input('portfolio_link'),
            'resume_path' => $resumePath,
            'cover_letter' => $request->input('cover_letter'),
        ]);
        
        return redirect()->route('jobs.index')->with('success', 'Form submited successfully');
    } 
    
}
