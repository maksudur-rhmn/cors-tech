<?php

namespace App\Http\Controllers;

use Str;
use Image; 
use Carbon\Carbon;
use App\Models\Course;
use App\Models\Lesson;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Auth;

class CourseController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('verified');
        $this->middleware('checkRole')->except('getSubCategory', 'store', 'update', 'delete');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       return view('backend.course.index', [
           'courses' => Course::orderBy('id', 'asc')->get(),
       ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('backend.course.create', [
        'categories' => Category::orderBy('category_name', 'asc')->get(),
     ]);
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
            'title'              => 'required',
            'category_id'        => 'required',
            'short_description'  => 'required',
            'description'        => 'required',
            'price'              => 'required',
            'status'             => 'required',
            'course_length'      => 'required',
            'introduction_video' => 'required',
            'cover_image'        => 'required|mimes:png,jpeg,jpg',
        ]);

          

        if($request->slug != '')
        {
            $slug = $request->slug;
            echo $slug;
        }
        else 
        {
            $slug = Str::slug($request->title);
            echo $slug;
        }


        

         $course = Course::create([

            'title'              => $request->title,
            'category_id'        => $request->category_id,
            'sub_category_id'    => $request->sub_category_id,
            'slug'               => $slug,
            'short_description'  => $request->short_description,
            'description'        => $request->description,
            'price'              => $request->price,
            'status'             => $request->status,
            'course_length'      => $request->course_length,
            'introduction_video' => $request->introduction_video,
            'cover_image'        => 'foo.jpg',
            'feature'            => $request->feature,
            'meta_title'         => $request->meta_title,
            'meta_description'   => $request->meta_description,
            'meta_keywords'      => $request->meta_keywords,
            'created_at'         => Carbon::now(),
            'user_id'            => Auth::id(),
            'feature'           => 'no',
         ]);

         $uploaded_file = $request->file('cover_image');
         $file_name = $course->id. '.' .$uploaded_file->extension('cover_image');
         $location = public_path('uploads/course/' . $file_name);
         Image::make($uploaded_file)->save($location);


            $file = $request->file('introduction_video');
            $filename = $file->getClientOriginalName();
            $path = public_path('uploads/intro-videos/');
            $file->move($path, $filename);


         $course->cover_image = strtolower($file_name);
         $course->introduction_video = $filename;
         $course->save();

         return back()->withSuccess('Course added successfully');
         
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function show(Course $course)
    {
        return view('backend.course.show', compact('course'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $course)
    {
       $categories = Category::orderBy('category_name', 'asc')->get();
       return view('backend.course.edit', compact('course', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Course $course)
    {
        $request->validate([

            'title'              => 'required',
            'category_id'        => 'required',
            'description'        => 'required',
            'short_description'  => 'required',
            'price'              => 'required',
            'status'             => 'required',
            'course_length'      => 'required',
            'introduction_video' => 'required',
            'meta_title'         => 'required',
            'meta_description'   => 'required',
            'meta_keywords'      => 'required',

        ]);
 
        if($request->hasFile('cover_image'))
        {
           if($course->cover_image != 'foo.jpg')
           {
               $existing_image = public_path('uploads/course/' . $course->cover_image);
               unlink($existing_image);
           }

           $uploaded_file = $request->file('cover_image');
           $file_name = $course->slug. '-' .$course->id. '.' .$uploaded_file->extension('cover_image');
           $location = public_path('uploads/course/' . $file_name);
           Image::make($uploaded_file)->save($location);

           $course->cover_image = $file_name;
        }

        if($request->hasFile('introduction_video')){

            $file = $request->file('introduction_video');
            $filename = $file->getClientOriginalName();
            $path = public_path('uploads/intro-videos/');
            return $file->move($path, $filename);
            $course->introduction_video = $filename;
        }
         $course->title              = $request->title;
         $course->category_id        = $request->category_id;
         $course->sub_category_id    = $request->sub_category_id;
         $course->short_description  = $request->short_description;
         $course->description        = $request->description;
         $course->price              = $request->price;
         $course->slug               = Str::slug($request->slug);
         $course->status             = $request->status;
         $course->course_length      = $request->course_length;
         $course->meta_title         = $request->meta_title; 
         $course->meta_description   = $request->meta_description;
         $course->meta_keywords      = $request->meta_keywords;
         $course->feature            = $request->feature;

         $course->save();

         return redirect('/course')->withSuccess('Course updated successfully');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $course)
    {
        //
    }

    public function decision($id)
    {
        $course = Course::findOrFail($id);
        if($course->feature == 'no')
        {
            $course->feature = 'yes';
            $course->save();
            return back()->withSuccess('Course Approved and is now ready for sale');
        }
        elseif($course->feature == 'yes')
        {
            $course->feature = 'no';
            $course->save();
            return back()->withSuccess('Course Declined and is now removed from sale page');
        }
    }
    public function delete($id)
    {
        Lesson::where('course_id', $id)->delete();
        Course::findOrFail($id)->delete();
        return back()->withSuccess('Course and all the lessons of this programme has been deleted');
    }

    public function getSubCategory(Request $request)
    {

       $subcategories = SubCategory::where('category_id', $request->category_id)->get();

        $data = "";
        foreach($subcategories as $subcategory)
        {
           $data.= "<option value='". $subcategory->id ."'>". $subcategory->name ."</option>";
        }

        echo $data;  

    }
}
