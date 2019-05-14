<?php

namespace App\Http\Controllers;

use App\Requirements;
use Illuminate\Http\Request;
use App\Jobs;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class RequirementsController extends Controller
{

    public function index($id)
    {
        $job = Jobs::findOrFail($id);
        $reqi = Requirements::where('job_id',$id)->get();
        return view('form.requirements',compact('job','reqi'));
    }

    public function create(Request $request,$id)
    {
        $job = Jobs::findOrFail($id);
        DB::table('requirements')->insert([
           'name' => $request->input('name'),
            'job_id' => $job->id
        ]);
        return back();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Requirements  $requirements
     * @return \Illuminate\Http\Response
     */
    public function show(Requirements $requirements)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Requirements  $requirements
     * @return \Illuminate\Http\Response
     */
    public function edit(Requirements $requirements)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Requirements  $requirements
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Requirements $requirements)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Requirements  $requirements
     * @return \Illuminate\Http\Response
     */
    public function destroy(Requirements $requirements)
    {
        //
    }
}
