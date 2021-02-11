<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Facebook;

class FacebookController extends Controller
{
    public function __construct()
    {
      $this->middleware('auth');
      $this->middleware('verified');
      $this->middleware('checkRole');
    }


    public function index()
    {
      return view('backend.facebook.group', [
        'facebook_group' => Facebook::findOrFail(1)->first(),
      ]);
    }

    public function store(Request $request)
    {
      Facebook::findOrFail($request->id)->update([
        'facebook_group' => $request->facebook_group,
      ]);
      return back()->withSuccess('Facebook Group updated successfully');
    }
}
