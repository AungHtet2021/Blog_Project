<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AuthController extends Controller
{
    public function create(){
        return view('auth.register');
    }

    public function store(){
        // dd(request()->all());
        $formData=request()->validate([
            'name'=>['required','max:255','min:3'],
            'username'=>['required',Rule::unique('users','username')],
            'email'=>['required','email',Rule::unique('users','email')],
            'password'=>['required','min:4']
        ]);
        // $formData['password']=bcrypt($formData['password']);
        // dd($formData);
        $user=User::create($formData);
        // session()->flash('success','Welcome Dear , '.$user->name);
        auth()->login($user);
        return redirect('/')->with('success','Welcome Dear , '.$user->name);
        // dd($formData);

    }

    public function login(){
        return view('auth.login');
    }

    public function post_login(){
        // dd('hit');
        $formData=request()->validate([
            'email'=>['required','email','max:255',Rule::exists('users','email')],
            'password'=>['required','min:4','max:255']
        ],['email.required'=>'we need your email address!',
            'password.min'=>'Password should be more than 4 characters!']);
        // dd($formData);
        if(auth()->attempt($formData)){
            return redirect('/')->with('success','welcome back');
        }else{
            return redirect()->back()->withErrors(
                ['email'=>'User Credentials Wrong']
            );
        }
    }

    public function logout(){
        auth()->logout();
        return redirect('/')->with('success','good bye');
    }
}
