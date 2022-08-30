<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use App\Models\User;
use App\Models\Category;


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

    public function store(){
        if (!auth()->check()) {
            try {
                User::factory()->create([
                    'username' => 'admin',
                    'password' => bcrypt('password'),
                ]);
                if(count(Category::all()) == 0) {
                    Category::factory()->create([
                        'name' => 'Default',
                        'slug' => 'default',
                    ]);
                }
            }catch (Exception $e){
                ;
            }

            return view('login');
        }
        else{
            return redirect('/dashboard');
        }
    }
}
