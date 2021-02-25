<?php

namespace App\Http\Controllers;

use App\Models\BecomeTrainer;
use Carbon\Carbon;
use Illuminate\Http\Request;

class BecomeTrainerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('verified');
        $this->middleware('checkRole');
    }

    public function index()
    {
        return view('backend.instructor.index');
    }

    public function store(Request $request)
    {
        $request->validate([
            'banner_desc'  => 'required',
            'benefits_one' => 'required',
            'benefits_two' => 'required',
            'benefits_three' => 'required',
            'team_helps'     => 'required',
            'trainer_desc'   => 'required',  
        ]);

        $become = BecomeTrainer::findOrFail($request->id);
        $become->update($request->except('_token') + ['created_at' => Carbon::now()]);

        return back()->withSuccess('Become a trainer page settings has been updated');
    }
}
