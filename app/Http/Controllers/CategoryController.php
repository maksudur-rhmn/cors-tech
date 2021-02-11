<?php

namespace App\Http\Controllers;

use Image;
use Carbon\Carbon;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('verified');
        $this->middleware('checkRole');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       return view('backend.category.index', [
           'categories' => Category::all(),
           'subcategories' => SubCategory::all(),
       ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validator

       $request->validate([
        'category_name' => 'required|unique:categories',
        'image'         => 'required|mimes:jpeg,jpg,png',
       ]);

        $category = Category::create($request->except('_token') + ['created_at' => Carbon::now()]);
        $image = $request->file('image');
        $filename = $category->id. '-' . $image->extension('image');
        $location = public_path('uploads/categories/' . $filename);
        Image::make($image)->save($location);


        $category->image = $filename;
        $category->save();


        return back()->withSuccess('Category saved successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('backend.category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
       $request->validate([
        'category_name' => 'required|unique:categories,category_name,'.$category->id,
        'image'         => 'mimes:jpeg,png,jpg',
       ]);

       if($request->hasFile('image'))
       {
           $image = $request->file('image');
           $filename = $category->id. '-' . $image->extension('image');
           $location = public_path('uploads/categories/' . $filename);
           Image::make($image)->save($location);

           $category->image = $filename;
       }

       $category->category_name = $request->category_name;
       $category->save();
       return redirect('/category')->withSuccess('Category updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        //
    }

    public function delete($id)
    {
      $category = Category::findOrFail($id);
        if($category->getCourse->count() != 0)
        {
          return back()->withDanger('This category has active courses. Please delete the course before deleting the category');
        }
        else
        {
          Category::findOrFail($id)->delete();

          return back()->withSuccess('Category deleted successfully');
        }
    }
}
