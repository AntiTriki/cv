<?php

namespace App\Http\Controllers;

use App\Jobs;
use App\Form;
use App\Postulation;
use App\Requirements;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;

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
    public function list(){
        $job = DB::table('jobs')->get();
        $cat = DB::table('categories')->get();
        return view('form.listJob',compact('job','cat'));
    }

    public function create(Request $request)
    {
        DB::table('jobs')->insert([
            'city' => $request->input('city'),
            'occupation' => $request->input('occupation'),
            'time_job' => $request->input('time_job'),
            'published' => $request->input('published'),
            'validity' => $request->input('validity'),
            'description' => $request->input('description'),
            'roles' => $request->input('roles'),
            'category_id' => $request->input('category_id'),
            'activo' => 1
        ]);
        $notification = array(
            'message' => 'Agregado Correctamente',
            'alert-type' => 'success'
        );

        return back()->with($notification);
    }

    public function show($id){

        $job = Jobs::findOrFail($id);
        $re = DB::table('requirements')->get();
        $cat = DB::table('categories')->get();
        return view('form.jobEdit',compact('job','re','cat'));
    }

    public function updates(Request $request){
        $idjob = $request->input('idjob');

        DB::table('jobs')->where('id',$idjob)->update([
            'city' => $request->input('city'),
            'occupation' => $request->input('occupation'),
            'time_job' => $request->input('time_job'),
            'published' => $request->input('published'),
            'validity' => $request->input('validity'),
            'description' => $request->input('description'),
            'roles' => $request->input('roles'),
            'category_id' => $request->input('category_id')
        ]);

        return redirect('home/form/requirements/'.$idjob);
    }

    public function edit($id)
    {
        $job = Jobs::findOrFail($id);
        $re = DB::table('requirements')->get();
        $cat = DB::table('categories')->get();

//        return "trae $id";

        return view('form.jobDetail',compact('job','cat','re'));
//        return back()->with(compact('job','cat','re','form'));
    }

    public function update($id)
    {
        $job = Jobs::findOrFail($id);
        $form = Form::where('user_id','=',Auth::user()->id)->value('id');
        $post = DB::table('postulations')->where('form_id',$form)->value('jobs_id');
//        revisar -------------------------------------------
        $today = Carbon::now()->addDays(30);
        if ($post > 0){
            return back()->with('error','El usuario ya tiene postulación');
        }else{
            DB::table('postulations')->insert([
                'form_id' => $form,
                'jobs_id' => $job->id,
                'fecha_insert' => $today,
                'activo' => 1
            ]);
            return back()->with('success','Postulación Correcta, valida por 30dias!');
        }
    }
    public function delete($id)
    {
        DB::table('jobs')->where('id', '=', $id)->delete();
        $notification = array(
            'message' => 'Se elimino correctamente',
            'alert-type' => 'error'
        );
        return back()->with($notification);
    }
}
