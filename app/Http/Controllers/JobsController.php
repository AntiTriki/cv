<?php

namespace App\Http\Controllers;

use App\Jobs;
use App\Form;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class JobsController extends Controller
{

    public function index()
    {
        $job = DB::table('jobs')->get();
//        return "redi $job";
        $re = DB::table('requirements')->get();
        $cat = DB::table('categories')->get();
        return view('form.jobs',compact('job','cat','re'));
    }

    public function create()
    {
        $job = DB::table('jobs')->get();
//        return "redi $job->id";
        return redirect('/home/form/jobDetail'.$job->id);
    }

    public function edit($id)
    {
        $job = Jobs::findOrFail($id);
        $re = DB::table('requirements')->get();
        $cat = DB::table('categories')->get();
        $user = Auth::user();

//        return "trae $form";

        return view('form.jobDetail',compact('job','cat','re'));
//        return back()->with(compact('job','cat','re','form'));
    }
//
//
//    public function update($id)
//    {
//        $job = Jobs::findOrFail($id);
//        $form = Form::where('user_id','=',Auth::user()->id)->value('id');
//        DB::table('postulations')->insert([
//            'form_id' => $form,
//            'jobs_id' => $job->id
//        ]);
//
//        return back();
//    }

    public function destroy(Jobs $jobs)
    {
        //
    }
}
