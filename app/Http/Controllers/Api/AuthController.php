<?php

namespace App\Http\Controllers\Api;

use Validator;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function register(Request $request){
        $validator = Validator::make($request->all(),[
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'password_confirmation' => 'required|same:password'

        ]);

        if($validator->fails()){
            $response = [
                'success'=> false,
                'massage'=> $validator->errors()
            ];
            return response()->json($response,400);
        }
        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $user = User::create($input);

        $success['token'] = $user->createToken('MyApp')->plainTextToken;
        $success['name'] = $user->name;
        
        $response =[
            'success' => true,
            'data' => $success,
            'massage' => 'User Register Successfully'
        ];

        return response()->json($response,200);
    }

    public function login(Request $request){
        if(Auth::attempt(['email'=>$request->email,'password'=>$request->password])){
            $user = Auth::user();

            $success['token'] = $user->createToken('MyApp')->plainTextToken;
        $success['name'] = $user->name;
        
        $response =[
            'success' => true,
            'data' => $success,
            'massage' => 'User Login Successfully'
        ];
        return response()->json($response,200);
        }else{
            $response =[
                'success' => false,
                'massage' => 'Unauthorised'
            ];
            return response()->json($response);
        }
    }
}
