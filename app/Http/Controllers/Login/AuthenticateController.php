<?php

namespace App\Http\Controllers\Login;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use DB;
use App\User;
use Auth;

class AuthenticateController extends Controller
{
    public function __construct()
    {
       // Apply the jwt.auth middleware to all methods in this controller
       // except for the authenticate method. We don't want to prevent
       // the user from retrieving their token if they don't already have it
       //$this->middleware('jwt.auth', ['except' => ['authenticate']]);
    }
   
    public function authenticate(Request $request)
    {
        // DB::table('users')->insert([
        //     'name' => 'tejas',
        //     'email' => 'tejas.gami@bacancytechnology.com',
        //     'password' => bcrypt('123456'),
        // ]);
        // grab credentials from the request
        $credentials = $request->only('email', 'password');

        try {
            // attempt to verify the credentials and create a token for the user
            if (! $token = JWTAuth::attempt($credentials)) {
                return response()->json(['error' => 'invalid_credentials'], 401);
            }
        } catch (JWTException $e) {
            // something went wrong whilst attempting to encode the token
            return response()->json(['error' => 'could_not_create_token'], 500);
        }
        $user = Auth::User()->name;
        // all good so return the token
        return response()->json(compact('token','user'));
    }

    public function index()
    {
        // Retrieve all the users in the database and return them
        $users = User::all();
        return $users;
    }
}
