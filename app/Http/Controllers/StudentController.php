<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\Sale;
use App\Models\User;
use App\Models\Course;
use App\Models\Lesson;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('verified');
    }

    public function index()
    {

        $record = Sale::where('user_id', Auth::id())->where('status', 'paid')->get();
      
         $data = [];
     
         foreach($record as $row) {
            $data['label'][] = $row->getCourse->title;
            $data['data'][] = (int) $row->price;
          }
     
        $data['chart_data'] = json_encode($data);
        
        $sales = Sale::where('user_id', Auth::id())->paginate(5);

        $newCoach = User::where('role', 'coach')->get();
         
        $coaches = [];

        foreach($newCoach->take(5) as $new)
        {
            $coaches['label'][] = $new->name;
            $coaches['data'][]  = (int) $new->count();
        }

        $coaches['chart_data'] = json_encode($coaches);

        return view('student.index',compact('sales', 'data', 'coaches'));
    }

    public function myCourse($id)
    {
        $owner = Sale::where('course_id', $id)->where('user_id', Auth::id())->where('status', 'paid')->exists();
        if($owner)
        {
            $course = Course::findOrFail($id);
            return view('student.course', compact('course'));
        }
        else 
        {
            return redirect('/student')->withSuccess('You do not have access to the cors');
        }
    }

    public function player($slug, $id)
    {
        $course      = Course::where('slug', $slug)->first();
        $lesson      = Lesson::where('id', $id)->first();
        $isBought    = Sale::where('user_id', Auth::id())->where('course_id', $course->id)->where('status', 'paid')->exists();

        if($isBought)
        {
            return view('student.player', compact('course', 'lesson'));
        }
        else 
        {
            return redirect('/student')->withSuccess('You do not have access to the cors');
        }
    }

    public function foo()
    {
        $check = Sale::where('user_id', Auth::id())->where('status', 'paid')->exists();

        if($check)
        {
            return back()->withSuccess('Please click on Access cors from My Cors section to continue watching lesson videos');
        }
        else 
        {
            return back()->withSuccess('You currently do not own any cors.');
        }
    }

    public function history()
    {
        return view('student.history', [
            'sales' => Sale::where('user_id', Auth::id())->get(),
        ]);
    }
}
