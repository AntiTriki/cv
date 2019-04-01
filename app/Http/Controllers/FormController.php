<?php

namespace App\Http\Controllers;

use App\Form;
use App\Level;
use App\Skill;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;



class FormController extends Controller
{

    public function index()
    {
//        $id = Session('usu-id');
        $form = Session('for_id');
        $levels = DB::table('levels')->where('form_id','=', $form)->get();
//        $usuario = DB::table('forms')->where('user_id','=',$id)->get();
//        return view('form.index',['usuario' => $usuario],['levels' => $levels]);
        return view('form.index',['levels' => $levels]);
    }
    public function skills($id)
    {
            $form = Form::findOrFail($id);
            $skill = Skill::findOrFail([1,2,3,4,5]);
            $Nivel = DB::table('names')->whereIn('id',[1,2,3,4])->get();

          return view('form.skills', compact('form','skill'),['Nivel' => $Nivel]);
    }

//    public function redir(Request $request) //falta agregar mas
//    {
//        $skillId = $request->id;
//        $skillName   =   Skill::updateOrCreate(['id' => $skillId],
//            ['name' => $request->name]);
//
//       return Response::json($skillName);
//    }

    public function store(Request $request)
    {
        $form = new Form();
        $form -> salary = $request -> salary;
        $form -> available_job = $request -> available_job;
        $form -> travel = $request -> travel;
        $form -> general = $request -> general;
        $form -> description = $request -> description;
        $form -> user_id = Auth::user()->id;
        $form -> save();


        return redirect('home/skills/'.$form->id);

    }
    public function create(Request $request)
    {
        DB::table('skills')->insert([
            'name' => $request->input('name')
        ]);

        $valor = $request->input('name');
        $idskill = DB::table('skills')->where('name', '=', $valor)-> value('skills.id');


        DB::table('levels')->insert([
            'skill_id'=> $idskill,
            'form_id'=> $request->input('form_id'),
            'nombre_id' => $request->input('nivel')
        ]);
        return back();
    }

    public function show(Form $form)
    {
        //
    }

    public function edit(Form $form)
    {
        //
    }


    public function update(Request $request, Form $form)
    {
        //
    }


    public function destroy(Form $form)
    {
        //
    }

}
