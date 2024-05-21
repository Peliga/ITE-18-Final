<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function viewUser(){
        return User::all();
    }
    public function register(Request $request) {
        $user = $request->validate([
            'name',
            'email',
            'password'
        ]);

        $user['password'] = Hash::make('password');

        $newUser = User::created($user);

        if(!$newUser){
            return true;
        }else{
            return false;
        }
    }
    public function login(Request $request){
        $request->validate([
            'email'=> 'required|email',
            'password' => 'required|min:6|max:20'
        ]);

        $credintial = $request->only('email','password');

        if(Auth::attempt($credintial)){
            return true;
        }else{
            return false;
        }
    }
    
}
