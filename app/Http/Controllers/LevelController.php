<?php

namespace App\Http\Controllers;

use App\Form;
use App\Level;
use App\Title;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class LevelController extends Controller
{

    public function index($id)
    {
        $form = Form::findOrFail($id);
        $title = Title::where('form_id',$id)->get();
        $gra = DB::table('grades')->get();
        return view('form.title', compact('form','title','gra'));
    }


    public function create(Request $request)
    {
        $year = $request->input('year');
//        $actual = Carbon::now();

        if ($year > 1970){
            DB::table('titles')->insert([
                'titulo' =>$request->input('titulo'),
                'institucion' => $request->input('institucion'),
                'year' => $request->input('year'),
                'grade_id' => $request->input('grade_id'),
                'form_id' => $request->input('form_id')
            ]);

            $notification = array(
                'message' => 'Agregado Correctamente',
                'alert-type' => 'success'
            );
            return back()->with($notification);
        }else{
            $notification = array(
                'message' => 'Ingresar otro año',
                'alert-type' => 'error'
            );
            return back()->with($notification);
        }


    }

    public function store(Request $request)
    {

        return view('form.enterprise');
    }

    public function edit($id)
    {
        $title = Title::findOrFail($id);
        $gra = DB::table('grades')->get();
        return view('form.titleEdit', compact('title','gra'));
    }

    public function update(Request $request)
    {
        $id = $request->input('idform');
        $idtitle = $request->input('idtitle');
        $year = $request->input('year');

        if ($year > 1970){
            DB::table('titles')->where('id',$idtitle)->update([
                'titulo' => $request->input('titulo'),
                'institucion' => $request->input('institucion'),
                'year' => $request->input('year'),
                'grade_id' => $request->input('grade_id')
            ]);

            $notification = array(
                'message' => 'Modificado Correctamente',
                'alert-type' => 'success'
            );

            return redirect('home/form/title/'.$id)->with($notification);
        }else{
            $notification = array(
                'message' => 'Ingresar otro año',
                'alert-type' => 'error'
            );
            return redirect('home/form/title/'.$id)->with($notification);
        }

    }
}
