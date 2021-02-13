<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\Sale;
use App\Models\Course;
use App\Models\Category;
use App\Models\Lesson;
use Illuminate\Http\Request;

class TrainerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('verified');
        $this->middleware('checkTrainer');
    }

    public function index()
    {
        $sales = Sale::where('trainer_id', Auth::id())->get();
        $myProgrammes = Course::where('user_id', Auth::id())->get();
        return view('trainer.index', compact('sales', 'myProgrammes'));
    }

    public function create()
    {
       if(Auth::user()->subscribed('Premium membership'))
       {
        return view('trainer.create',[
            'categories' => Category::orderBy('category_name', 'asc')->get(),
        ]);
       }
       else 
       {
           return redirect('/trainer')->withSuccess('Please subscribe to premium trainership to start selling your course');
       }
    }

    public function lessonCreate()
    {
        if(Auth::user()->getCourse->count() != 0)
        {
           return view('trainer.lesson',[
            'courses' => Course::where('user_id', Auth::id())->get(),
           ]);
        }
        else 
        {
            return back()->withSuccess('You do not have any programs yet. Add a program to attach lesson');
        }
    }

    public function lessonList($id)
    {
        $lessons = Lesson::where('course_id', $id)->orderBy('serial', 'asc')->get();
        return view('trainer.lessonlist', compact('lessons'));
    }

    public function deleteprogramme()
    {
        return view('trainer.delete', [
            'myProgrammes' => Course::where('user_id', Auth::id())->get(),
        ]);
    }
}
