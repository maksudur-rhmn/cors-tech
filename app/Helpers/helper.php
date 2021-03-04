<?php

function isBought($id)
{
  return \App\Models\Sale::where('user_id', Auth::id())->where('course_id', $id)->where('status', 'paid')->exists();
}

function isAdmin()
{
  return Auth::user()->role;
}

function trainers()
{
  return \App\Models\User::where('role', 'coach')->get();
}

function students()
{
  return \App\Models\User::where('role', 'student')->get();
}
function admins()
{
  return \App\Models\User::where('role', 'admin')->get();
}

function userCourse($id)
{
  return \App\Models\Sale::where('user_id', $id)->where('status', 'paid')->count();
}

function nextCycle($id)
{
    return \Carbon\Carbon::parse(\App\Models\Subscription::where('owner_id', $id)->first()->cycle_ends_at)->format('d-M-Y');
}

function totalCourses()
{
  return \App\Models\Course::count();
}

function totalSales()
{
  return \App\Models\Sale::where('status', 'paid')->get()->count();
}

function totalSubscribers()
{
  return \App\Models\Subscription::count();
}

function totalLessons()
{
  return \App\Models\Lesson::count();
}

function categories()
{
  return \App\Models\Category::latest()->get();
}

function courses()
{
  return \App\Models\Course::where('feature', 'yes')->orderBy('id', 'desc')->get();
}

function failedPayments($id)
{
  return \App\Models\Sale::where('user_id', $id)->where('status', 'pending')->get();
}

function about()
{
  return  \App\Models\About::first();
}
function become()
{
  return  \App\Models\BecomeTrainer::first();
}

function faqs()
{
  return \App\Models\Faq::all();
}

function setting()
{
  return \App\Models\GeneralSettings::first();
}

function average_stars($course_id)
{

  if(App\Models\Review::where('course_id', $course_id)->whereNotNull('stars')->count() == 0)
  {
    return 0;
  }
  else
  {
    $average = App\Models\Review::where('course_id', $course_id)->whereNotNull('stars')->sum('stars')/App\Models\Review::where('course_id', $course_id)->whereNotNull('stars')->count();
    return $average;
  }
}

function star_count($course_id, $stars)
{
 return App\Models\Review::where('course_id', $course_id)->where('stars', $stars)->count();
}

function review($course_id)
{
  return App\Models\Review::where('course_id', $course_id)->get();
}