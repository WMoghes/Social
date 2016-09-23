<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function getAccount(){
        return view('account', ['user' => Auth::user()]);
    }

    public function postAccountUpdate(Request $request){
        // Validation

        $user = Auth::user();
        $user->first_name = $request['first_name'];
        $user->update();
        $file = $request->file('image');
        $filename = $request['filename'] . '-' . $user->id . '.jpg';
        if($file){
            Storage::disk('local')->put($filename, File::get($file));
        }
        return redirect()->route('account');
    }

    public function getUserImage($filename){
        $file = Storage::disk('local')->get($filename);
        return new Response($file, 200);
    }

    public function getHome(){
        if(Auth::check()){
            return redirect()->route('dashboard');
        }else {
            return view('welcome');
        }
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
}
