<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class UserController extends Controller
{
    public function create(){
        $attributes = request()->validate([
            'username' => 'required|exists:users,username',
            'password' => 'required'
        ]);

        if (! auth()->attempt($attributes)){
            throw ValidationException::withMessages([
                'username'=>'Your provided credentials could not be verified'
            ]);

        }



        session()->regenerate();

        return redirect('/dashboard')->with('success','Welcome Back');
    }

    public function destroy(){
        auth()->logout();
        return redirect('/');
    }
}
