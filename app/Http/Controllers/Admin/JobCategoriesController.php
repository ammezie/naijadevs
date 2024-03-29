<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;

class JobCategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();

        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validate form data
        $vaildatedData = $request->validate([
            'name' => 'required',
            'color' => 'required'
        ]);

        $category = new Category;

        $category->name = $vaildatedData['name'];
        $category->slug = str_slug($vaildatedData['name']);
        $category->color = $vaildatedData['color'];

        // persist to database
        $category->save();

        return redirect()->route('categories.index')->with('success', 'Category added!');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('admin.categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        // validate form data
        $vaildatedData = $request->validate([
            'name' => 'required',
            'color' => 'required'
        ]);

        $category->name = $vaildatedData['name'];
        $category->slug = str_slug($vaildatedData['name']);
        $category->color = $vaildatedData['color'];

        // persist to database
        $category->save();

        return redirect()->route('categories.index')->with('success', 'Category updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()->back()->with('success', 'Category deleted!');
    }
}
