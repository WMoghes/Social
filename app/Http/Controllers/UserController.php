<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function getHome(){
        return view('welcome');
    }
    public function postSignup(Request $request){

        $this->validate($request, [
            'email'           => 'unique:users',
            'first_name'      => 'max:120',
            'password'        => 'min:4'
        ]);

        $user = new User();
        $user->email          = $request['email'];
        $user->first_name     = $request['first_name'];
        $user->password       = bcrypt($request['password']);

        $user->save();
        Auth::login($user);
        return redirect()->route('dashboard');
    }

    public function postSignin(Request $request){
        if(Auth::attempt(['email' => $request['email'],'password' => $request['password']]))
        {
            return redirect()->route('dashboard');
        }

        return redirect()->back();
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('home');
    }
    public function getDashboard(){
        return view('dashboard');
    }
}
