<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        return view('create_category');
    }

    public function store(Request $request)
    {
        $attributes = request()->validate([
            'name' => ['required', Rule::unique('categories','name')],
            'slug' => ['required', Rule::unique('categories','slug')],
        ]);

        Category::create($attributes);

        return redirect(app()->getLocale().'/items/create')->with('success', __('Category "').$attributes['name'].__('" Created Successfully.'));
    }
}
