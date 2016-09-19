<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;

class UserController extends Controller
{
    public function postSignup(Request $request){
        $user = new User();
        $user->email = $request['email'];
        $user->first_name = $request['first_name'];
        $user->password = bcrypt($request['password']);

        $user->save();
        return redirect()->back();
    }

    public function postSignin(Request $request){

    }
}
