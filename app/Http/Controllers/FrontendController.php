<?php

namespace App\Http\Controllers;

use Auth;
use Artisan;
use Session;
use Carbon\Carbon;
use App\Models\Sale;
use App\Models\User;
use App\Models\Course;
use App\Models\Lesson;
use App\Models\Category;
use App\Models\Facebook;
use App\Models\CoachInfo;
use App\Models\MemberArea;
use App\Models\ProfileViews;
use Illuminate\Http\Request;
use Stevebauman\Location\Facades\Location;

class FrontendController extends Controller
{

   public function index()
   {
       return view('frontend.indexone');
   }

   public function coachProximite()
   {
     $position = Location::get(request()->ip());
     $trainers = User::where('role', 'coach')->where('ip', $position->countryName)->get();
     return view('frontend.coachProximite',compact('trainers'));
   }

   public function indexlogin()
   {
     return view('frontend.indexlogin');
   }

   public function courses()
   {
       return view('frontend.course', [
        'courses'     => Course::latest()->get(),
        'features'    => Course::where('feature', 'yes')->get(),
        'categories'  => Category::orderBy('category_name', 'asc')->get(),
       ]);
   }

   public function about()
   {
     return view('frontend.about');
   }

   public function ownedCourses()
   {
       return view('frontend.ownedCourses', [
        'courses'     => Sale::where('user_id', Auth::id())->where('status', 'paid')->get(),
        'free'        => Course::where('status', 'free')->get(),
        'premium'     => Course::where('status', 'free for subscribers')->get(),
        'features'    => Course::where('feature', 'yes')->get(),
        'categories'  => Category::orderBy('category_name', 'asc')->get(),
       ]);
   }

   public function search()
   {

     $q = request('q');
     $feld = request('field');
     $price = request('p');
     $sub = request('sub');

     $courses = Course::where('title', 'LIKE', '%'.$q.'%')
                      ->Where('category_id', 'LIKE', '%'.$feld.'%')
                      ->Where('sub_category_id', 'LIKE', '%'.$sub.'%')
                      ->where('price', 'LIKE', '%'.$price.'%')
                      ->get();

    $features    = Course::where('feature', 'yes')->get();
    $categories  = Category::orderBy('category_name', 'asc')->get();
    // return view('frontend.course', compact('courses', 'categories', 'features'));
    return view('frontend.indexlogin', compact('courses', 'categories'));

   }

   public function details($slug)
   {
       $course      = Course::where('slug', $slug)->first();
       $features    = Course::where('feature', 'yes')->get();
       $isBought    = Sale::where('user_id', Auth::id())->where('course_id', $course->id)->where('status', 'paid')->exists();

       return view('frontend.course-detailsn', compact('course', 'features', 'isBought'));
   }

   public function player($slug, $id)
   {

    $course      = Course::where('slug', $slug)->first();
    $lesson      = Lesson::where('id', $id)->first();
    $features    = Course::where('feature', 'yes')->get();
    $isBought    = Sale::where('user_id', Auth::id())->where('course_id', $course->id)->where('status', 'paid')->exists();

    if($course->status == 'free')
    {
        return view('frontend.course-player', compact('course', 'lesson', 'features'));
    }
    if($isBought)
    {
      return view('frontend.course-player', compact('course', 'lesson', 'features'));
    }
    if(Auth::user()->subscribed('Premium membership'))
    {
      return view('frontend.course-player', compact('course', 'lesson', 'features'));
    }
    if(Auth::user()->role == 'admin')
    {
      return view('frontend.course-player', compact('course', 'lesson', 'features'));
    }
    return back()->withErrors('Please buy the course to watch the tutorials');

   }

   public function account()
   {
     return view('frontend.account', [
       'data' => Auth::user(),
     ]);
   }

   public function subscribe()
   {
     return view('frontend.subscribe');
   }

   public function member()
   {
    if(Auth::user()->subscribed('Premium membership') || isAdmin() == 'admin')
    {
      return view('frontend.member_area', [
        'articles' => MemberArea::latest()->get(),
        'facebook_group' => Facebook::first(),
      ]);
    }
    else
    {
      return redirect('/subscribe')->withDanger('Please subscribe to access member area. Thank you');
    }
   }

   public function contact()
   {
       
     return view('frontend.contact');
    
   }

   public function instructor()
   {
     return view('frontend.instructor');
   }

   public function coachProfile($id)
   {
     $data = CoachInfo::where('user_id', $id)->first();

     $coach = User::findOrFail($id); 

     if(ProfileViews::where('user_id', $id)->where('created_at', Carbon::today())->exists())
     {
      ProfileViews::where('user_id', $id)->increment('views');
     }
     else
     {
       ProfileViews::create([
        'user_id' => $id, 
        'views'   => 1,
       ]);
     }

     return view('frontend.coach-profile', compact('data', 'coach'));
   }


  // END 
}
