<?php

namespace App\Http\Controllers;

use App\Form;
use App\Level;
use App\Title;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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
        DB::table('titles')->insert([
            'titulo' =>$request->input('titulo'),
            'institucion' => $request->input('institucion'),
            'year' => $request->input('year'),
            'grade_id' => $request->input('grade_id'),
            'form_id' => $request->input('form_id')
        ]);

        return back();
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
        DB::table('titles')->where('id',$idtitle)->update([
           'titulo' => $request->input('titulo'),
           'institucion' => $request->input('institucion'),
           'year' => $request->input('year'),
           'grade_id' => $request->input('grade_id')
        ]);

        return redirect('home/form/title/'.$id);
    }
}
