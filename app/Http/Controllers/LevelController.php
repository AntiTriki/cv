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
        return view('form.enterprise', compact('form','title','gra'));
    }


    public function create(Request $request)
    {
        DB::table('titles')->insert([
            'titulo' =>$request->input('titulo'),
            'institucion' => $request->input('institucion'),
            'year' => $request->input('year'),
            'grade_id' => $request->input('grade_id')
        ]);
    }

    public function store(Request $request)
    {

        return view('form.enterprise');
    }

    public function edit(Level $level)
    {
        //
    }

    public function update(Request $request, Level $level)
    {
        //
    }
}
