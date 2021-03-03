<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Sale;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
   public function __construct()
   {
       $this->middleware('auth');
       $this->middleware('verified');
   }

   public function index()
   {
       if(Auth::user()->role == 'student')
       {
           $sales = Sale::where('user_id', Auth::id())->paginate(5);
           $reviews = Review::where('user_id', Auth::id())->get();
           return view('student.review', compact('sales', 'reviews'));
       }
       else 
       {
           return back();
       }
   }

   public function store(Request $request)
   {
       $request->validate([
        'stars' => 'required',
        'reviews' => 'required',
       ]);


       Review::create($request->except('_token') + ['created_at' => Carbon::now(), 'user_id' => Auth::id()]);

       return back()->withSuccess('Review Added');
   }
}
