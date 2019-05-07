<?php

namespace App\Http\Controllers;

use App\Jobs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class JobsController extends Controller
{

    public function index()
    {
        $job = DB::table('jobs')->get();
        $cat = DB::table('categories')->get();
        return view('form.jobs',compact('job','cat'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        $job = Jobs::findOrFail($id);
        $re = DB::table('requirements')->get();
        $cat = DB::table('categories')->get();
        return view('form.jobDetail',compact('job','cat','re'));
    }

    public function edit(Jobs $jobs)
    {
        //
    }

    public function update(Request $request, Jobs $jobs)
    {
        //
    }

    public function destroy(Jobs $jobs)
    {
        //
    }
}
