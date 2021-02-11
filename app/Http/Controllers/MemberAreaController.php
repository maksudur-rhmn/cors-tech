<?php

namespace App\Http\Controllers;

use App\Models\MemberArea;
use Illuminate\Http\Request;
use Carbon\Carbon;

class MemberAreaController extends Controller
{

    public function __construct()
    {
      $this->middleware('auth');
      $this->middleware('verified');
      $this->middleware('checkRole');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.members.members', [
          'articles' => MemberArea::latest()->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('backend.members.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $request->validate([
        'title' => 'required',
        'article' => 'required',
        ]);
       MemberArea::create($request->except('_token') + ['created_at' => Carbon::now()]);

       return back()->withSuccess('Premium Article added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MemberArea  $memberArea
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       $memberArea = MemberArea::findOrFail($id)->first();
       return view('backend.members.show', compact('memberArea'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MemberArea  $memberArea
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $memberArea = MemberArea::findOrFail($id)->first();
       return view('backend.members.edit', compact('memberArea'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MemberArea  $memberArea
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

      $request->validate([
        'title' => 'required',
        'article' => 'required',
        ]);

       MemberArea::findOrFail($id)->update([
          'title'    => $request->title,
          'article'  => $request->article,
       ]);

       return redirect('/members')->withSuccess('Article updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MemberArea  $memberArea
     * @return \Illuminate\Http\Response
     */
    public function destroy(MemberArea $memberArea)
    {
        //
    }

    public function delete($id)
    {
      MemberArea::findOrFail($id)->delete();

      return back()->withSuccess('Article Deleted');
    }
}
