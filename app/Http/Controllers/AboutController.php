<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\About;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('verified');
        $this->middleware('checkRole');
    }

    public function index()
    {
        return view('backend.members.create', [
            'about' => About::first(),
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([

            'banner_desc'       => 'required',
            'our_goal_desc'     => 'required',
            'just_start_one'    => 'required',
            'just_start_two'    => 'required',
            'just_start_three'  => 'required',
            'benefits_one'      => 'required',
            'benefits_two'      => 'required',
            'benefits_three'    => 'required',
            'why_cors'          => 'required',
        ]);

        $about = About::findOrFail($request->id);
       $about->update($request->except('_token') + ['updated_at' => Carbon::now()]);

        return back()->withSuccess('About Settings updated');
    }
}
