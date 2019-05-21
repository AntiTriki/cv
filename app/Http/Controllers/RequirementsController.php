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
        $notification = array(
            'message' => 'Agregado Correctamente',
            'alert-type' => 'success'
        );
        return back()->with($notification);
    }

    public function edit($id)
    {
        $re = Requirements::findOrFail($id);

        return view('form.requirementsEdit',compact('re'));
    }

    public function update(Request $request,$id )
    {
        $re = Requirements::findOrFail($id);
        $idre = $request->input('re_id');

        DB::table('requirements')->where('id',$idre)->update([
           'name' => $request->input('name')
        ]);
        $notification = array(
            'message' => 'Modificado Correctamente',
            'alert-type' => 'success'
        );
        return redirect('home/form/requirements/'.$re->job_id)->with($notification);
    }

    public function delete($id)
    {
        DB::table('requirements')->where('id', '=', $id)->delete();
        $notification = array(
            'message' => 'Se elimino correctamente',
            'alert-type' => 'error'
        );
        return back()->with($notification);
    }
}
