<?php

namespace App\Http\Controllers;

use App\Form;
use App\Level;
use App\Skill;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Input;
use Validator;
use Response;
use View;


class FormController extends Controller
{
    public function index()
    {
            $id = Session('usu-id');
            $usuario = DB::table('forms')->where('user_id','=',$id)->get();
    //        return view('form.index',['usuario' => $usuario],['levels' => $levels]);
        return view('form.curriculum',['usuario' => $usuario]);
    }

//    public function index() ------------antes crear nuevo
//    {
////        return("manda");
//
//        $id = Session('usu-id');
////      $form = Form::find($id);
//        $formi = Session('for_id');
//        $levels = DB::table('levels')->where('form_id','=', $formi)->get();
//        $usuario = DB::table('forms')->where('user_id','=',$id)->get();
////        return view('form.index',['usuario' => $usuario],['levels' => $levels]);
//        return view('form.curriculum',['usuario' => $usuario],['levels' => $levels]);
//    }

    public function index2($id)
    {
        //$id = Session('usu-id');
        $form = Form::find($id);
        $formi = Session('for_id');
        $levels = DB::table('levels')->where('form_id','=', $formi)->get();
//        $usuario = DB::table('forms')->where('user_id','=',$id)->get();
//        return view('form.index',['usuario' => $usuario],['levels' => $levels]);
        return view('form.index',compact('form'),['levels' => $levels]);
    }

    public function skills2( )
    {

        $sess = Session('form_ide');
        $form = DB::table('forms')->where('id','=',$sess)->get();
        $skill = Skill::findOrFail([1,2,3,4,5]);
        $Nivel = DB::table('names')->whereIn('id',[1,2,3,4])->get();

        return view('form.skills2', compact('form','skill'),['Nivel' => $Nivel]);
    }

    public function skills($id)
    {
            $form = Form::findOrFail($id); //busca el formulario correspondiente
//            $skill = Skill::findOrFail([1,2,3,4,5]); //muestra por defecto esos skill (estaticos)
            $level = Level::where('form_id',$id)->get(); //muestra los datos perteneciente al formulario (el primero)
            $Nivel = DB::table('names')->whereIn('id',[1,2,3,4])->get(); //muestra los niveles (estaticos)--hacer despues

          return view('form.skills', compact('form','level'),['Nivel' => $Nivel]);
    }

    public function store(Request $request)
    {

        $form = new Form();
        $form -> salary = $request -> salary;
        $form -> available_job = $request -> available_job;
        $form -> travel = $request -> travel;
        $form -> general = $request -> general;
        $form -> description = $request -> description;
//        $form -> user_id = Auth::user()->id;
        $form -> user_id = $request ->input('pk-usuario');
        $form -> save();

        return redirect('home/skills2/'.$form->id);
    }
    public function store2(Request $request,$id)
    {
        $form = Form::find($id);
        $form -> salary = $request ->input('salary');
        $form -> available_job = $request ->input('available_job');
        $form -> travel = $request ->input('travel');
        $form -> general = $request ->input('general') ;
        $form -> description = $request ->input('description');
        $form -> user_id = Auth::user()->id;
//        $form -> user_id = $request ->input('pk-usuario');
        $form -> save();



        return redirect('home/skills/'.$form->id);

    }

    public function create2(Request $request)
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
        return redirect('/home/skills2');
    }

    public function create(Request $request)
    {
            DB::table('skills')->insert([
                'name' => $request->input('name')
            ]);
            $valor = $request->input('name');
            $idskill = DB::table('skills')->where('name', '=', $valor)->value('skills.id');

//            DB::table('levels')->insert([
//                'skill_id' => $idskill,
//                'form_id' => $request->input('form_id'),
//                'nombre_id' => $request->input('nivel')
//            ]);

            $post = new Level();
            $post->skill_id =$idskill;
            $post->form_id = $request->input('form_id');
            $post->nombre_id = $request->input('nivel');
            $post->save();
            return Response::json($post);

//            return back();
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
