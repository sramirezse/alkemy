<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
// use App\Controllers\Controller;
class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */


    public function loginAdmin(Request $request)
    {

         // return response()->json(['success' => true, 'user' => $request->all(), 201]);
         $credentials = $request->only('email', 'password');
         if(Auth::user()){
            return response()->json([ 'user' => Auth::user()]);

        }
         if (Auth::attempt($credentials)) {
             $user = User::where('email', $request->email)->first();
             // Authentication passed...
             // return redirect()->intended('/login');
             $user->token = $user->createToken('auth');

             return response()->json(['success' => true, 'user' => $user, 200]);
         }
         return response()->json(['error' => 'Unauthorized', 'success' => true, $request->all()], 401);
         // return redirect()->back()->withInput($request->only('email'));
    }

    public function user(){
        // dd('asfasfasasfasfasf');
        if(Auth::user()){
            $user = [];
            $user['id'] = Auth::user()->id;
            $user['name'] = Auth::user()->name;
            $user['email'] = Auth::user()->email;
            $user['role'] = Auth::user()->role;
            $user['avatar'] = 'https://ui-avatars.com/api/background=6C5FFC&color=fff?name=' .   Str::snake(Auth::user()->name) ;

            return response()->json(['success'=>true,'status' => 200, 'user' => $user]);

        }else{
            return response()->json(['error' => 'Unauthorized'], 401);
        }


    }
    public function logout(Request $request)
    {
        // Auth::user()->tokens()->delete();
        $request->user()->currentAccessToken()->delete();
        $request->session()->invalidate();
        return response()->json(['success' => true, $request->all()]);
    }
}
