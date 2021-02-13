<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Course;
use App\Models\Lesson;
use Illuminate\Http\Request;

class LessonController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('verified');
        $this->middleware('checkRole')->except('store', 'destroy');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.lessons.create', [
            'courses' => Course::orderBy('title', 'asc')->get(),
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
            'course_id'    => 'required',
            'lesson_title' => 'required',
            'lesson_video' => 'required',
            'serial'       => 'required',
        ]);

        $lesson = Lesson::create($request->except('_token') + ['created_at' => Carbon::now()]);
        $file = $request->file('lesson_video');
        $filename = $file->getClientOriginalName();
        $path = public_path('uploads/lesson-videos/');
        $file->move($path, $filename);

        $lesson->lesson_video = $filename;
        $lesson->save();
        return back()->withSuccess('Lesson added to the course');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Lesson  $lesson
     * @return \Illuminate\Http\Response
     */
    public function show(Lesson $lesson)
    {
        //
    }

    public function list($id)
    {
        $lessons = Lesson::where('course_id', $id)->orderBy('serial', 'asc')->get();
        return view('backend.lessons.show', compact('lessons'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Lesson  $lesson
     * @return \Illuminate\Http\Response
     */
    public function edit(Lesson $lesson)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Lesson  $lesson
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Lesson $lesson)
    {
       $lesson->serial = $request->serial;
       $lesson->save();
       return back()->withSuccess('Course lesson re-ordered successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Lesson  $lesson
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lesson $lesson)
    {
       $lesson->delete();

       return back()->withSuccess('Lesson Deleted');
    }
    
    
    public function lessonedit(Request $request)
    {
        Lesson::findOrFail($request->id)->update([
            
            'lesson_title' => $request->lesson_title,
            'lesson_video' => $request->lesson_video,
            
            ]);
            
            return back()->withSuccess('Lesson updated successfully');
    }
}
