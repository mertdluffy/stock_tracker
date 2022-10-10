<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
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
        return redirect(url(app()->getLocale().'/items'));
    }
    public function edit(Request $request,string $loc,string $mode){
        $prev = "en";
        if($mode == 0) {
            app()->setLocale("en");
            $prev ="tr";
        }
        else
            app()->setLocale("tr");

        return redirect()->to(Str::replace($prev,app()->getLocale(),url()->previous()));

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

            return redirect(url(app()->getLocale().'/items'));
        }
    }
}
