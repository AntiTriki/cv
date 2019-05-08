<?php

namespace App\Http\Controllers;

use App\Jobs;
use App\Form;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class JobsController extends Controller
{

    public function index()
    {
        $job = DB::table('jobs')->get();
        $re = DB::table('requirements')->get();
        $cat = DB::table('categories')->get();
        return view('form.jobs',compact('job','cat','re'));
    }

//    public function redir(Request $request)
//    {
//        return redirect()
//    }

    public function show($id)
    {

        $job = Jobs::findOrFail($id);
        $re = DB::table('requirements')->get();
        $cat = DB::table('categories')->get();
        $user = Auth::user();
        $form = Form::where('user_id','=',Auth::user()->id)->value('id');
//        return "trae $form";

        DB::table('postulations')->insert([
           'form_id' => $form,
            'jobs_id' => $job->id
        ]);

        return view('form.jobDetail',compact('job','cat','re','form'));
//        return back()->with(compact('job','cat','re','form'));
    }
    public function store(Request $request)
    {
        //
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
