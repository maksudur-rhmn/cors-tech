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
  return \App\Models\Course::latest()->get();
}

function failedPayments($id)
{
  return \App\Models\Sale::where('user_id', $id)->where('status', 'pending')->get();
}

function about()
{
  return  \App\Models\About::first();
}

function faqs()
{
  return \App\Models\Faq::all();
}

function setting()
{
  return \App\Models\GeneralSettings::first();
}
