<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\GeneralSettings;

class GeneralSettingsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('verified');
        $this->middleware('checkRole');
    }

    public function index()
    {
        return view('backend.general.index', [
            'setting' => GeneralSettings::first(),
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'phone' => 'required',
            'email' => 'required', 
            'address' => 'required',
        ]);

        $setting = GeneralSettings::findOrFail($request->id);
       $setting->update($request->except('_token') + ['updated_at' => Carbon::now()]);

        return back()->withSuccess('Settings updated');
    }
}
