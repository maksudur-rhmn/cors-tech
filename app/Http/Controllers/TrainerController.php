<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\Sale;
use App\Models\User;
use App\Models\Course;
use App\Models\Lesson;
use App\Models\Category;
use App\Models\CoachInfo;
use App\Models\ProfileViews;
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


        $record = Sale::where('trainer_id', Auth::id())->where('status', 'paid')->get();
      
        $data = [];
    
        foreach($record as $row) {
           $data['label'][] = $row->created_at->format('d M Y');
           $data['data'][] = (int) $row->price;
         }
    
       $data['chart_data'] = json_encode($data);

       $newCoach = ProfileViews::where('user_id', Auth::id())->get();
        
       $coaches = [];

       foreach($newCoach->take(5) as $new)
       {
           $coaches['label'][] = $new->created_at->format('d M Y');
           $coaches['data'][]  = (int) $new->views;
       }

       $coaches['chart_data'] = json_encode($coaches);

        return view('trainer.index', compact('sales', 'myProgrammes', 'data', 'coaches'));
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
    public function createWithoutSubscription()
    {
        return view('trainer.create',[
            'categories' => Category::orderBy('category_name', 'asc')->get(),
        ]);
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
        return view('trainer.lessonList', compact('lessons'));
    }

    public function deleteprogramme()
    {
        return view('trainer.delete', [
            'myProgrammes' => Course::where('user_id', Auth::id())->get(),
        ]);
    }
}
