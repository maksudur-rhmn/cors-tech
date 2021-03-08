<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\CoachInfo;
use Illuminate\Http\Request;
use Image;
use Auth;

class CoachInfoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('verified');
    }

    public function index()
    {
        if(Auth::user()->role == 'coach')
        {
            return view('trainer.profile',[
                'data' => Coachinfo::where('user_id', Auth::id())->first(),
            ]);
        }
        else 
        {
            return view('student.profile',[
                'data' => Coachinfo::where('user_id', Auth::id())->first(),
            ]);
        }
    }

    public function store(Request $request)
    {
        $request->validate([
            'qualification_one' => 'required',
            'who_i_am'          => 'required', 
            'cover_picture'     => 'mimes:jpeg,jpg,png,jpeg',
            'who_i_am_picture'  => 'mimes:jpeg,jpg,png,jpeg'
        ]);

        $data = CoachInfo::where('user_id', Auth::id())->first();

        if($data)
        {
            $data->update($request->except('_token') + ['created_at' => Carbon::now()]);

        if($request->hasFile('cover_picture'))
        {
            $cover = $request->file('cover_picture');
            $filename = $data->id. '.' . $cover->extension('cover_picture');
            $location = public_path('uploads/trainers/cover/' . $filename);
            Image::make($cover)->save($location);
            $data->cover_picture = $filename;
            $data->save();
        }
        if($request->hasFile('who_i_am_picture'))
        {
            $cover = $request->file('who_i_am_picture');
            $filename = $data->id. '.' . $cover->extension('who_i_am_picture');
            $location = public_path('uploads/trainers/whoiam/' . $filename);
            Image::make($cover)->save($location);
            $data->who_i_am_picture = $filename;
            $data->save();
        }
        }
        else 
        {
           $data =  CoachInfo::create($request->except('_token') + ['created_at' => Carbon::now()]);

        if($request->hasFile('cover_picture'))
        {
            $cover = $request->file('cover_picture');
            $filename = $data->id. '.' . $cover->extension('cover_picture');
            $location = public_path('uploads/trainers/cover/' . $filename);
            Image::make($cover)->save($location);
            $data->cover_picture = $filename;
            $data->save();
        }
        if($request->hasFile('who_i_am_picture'))
        {
            $cover = $request->file('who_i_am_picture');
            $filename = $data->id. '.' . $cover->extension('who_i_am_picture');
            $location = public_path('uploads/trainers/whoiam/' . $filename);
            Image::make($cover)->save($location);
            $data->who_i_am_picture = $filename;
            $data->save();
        }
        }

        return back()->withSuccess('Profile page updated');
    }
}
