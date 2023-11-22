<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Application;
use Illuminate\Support\Facades\Validator;

class FormController extends Controller
{
    public function form(Request $request)
    {
        $validator=Validator::make($request->all(),[
            'name' => 'required|string',
            'email' => 'required|email',
            'portfolio_link' => 'required|string',
            'resume' => 'required|mimes:pdf,doc,docx,img,png', // Update the field name to 'resume'
            'cover_letter' => 'required|string'
        ]);
        if ($validator->fails()) {
            return response()->json(['success' => false, 'message' => $validator->errors()], 422);


        }
        $input=new Application();
        $input->job_id=$request->input('job_id');
        $input->name=$request->input('name');
        $input->email=$request->input('email');
        $input->portfolio_link=$request->input('portfolio_link');
        $input->resume=$request->input('resume');
        $input->cover_letter=$request->input('cover_letter');
        $input->save();



        return response()->json(['success' => true, 'message' => 'Form submitted successfully'], 200);


    }
}
