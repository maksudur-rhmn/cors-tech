<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\Sale;
use App\Models\Category;
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
        return view('trainer.index', compact('sales'));
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
}
