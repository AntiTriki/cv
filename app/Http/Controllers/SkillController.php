<?php

namespace App\Http\Controllers;

use App\Skill;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class SkillController extends Controller
{
    public function index()
    {
        $id = Session('usu-id');
        $form = Session('for_id');
        $levels = DB::table('levels')->where('form_id','=', $form)->get();
        $usuario = DB::table('forms')->where('user_id','=',$id)->get();
        return view('home/skills/',['usuario' => $usuario],['levels' => $levels]);
    }

//    public function create(Request $request)
//    {
//        DB::table('skills')->insert([
//            'name' => $request->input('name')
//        ]);
//
//        $valor = $request->input('name');
//
//        $form = Session('for_id');
//        $levels = DB::table('levels')->where('form_id','=', $form)->get();
//
//        $idskill = DB::table('skills')->where('name', '=', $valor)-> value('id');
//
//        DB::table('levels')->insert([
//            'skill_id'=> $idskill,
//            'name'=> 'Basico',
//            'form_id' => $levels
//
//        ]);
//        return back();
//    }


    public function store(Request $request)
    {
        //
    }


    public function show(Skill $skill)
    {
        //
    }


    public function edit(Skill $skill)
    {
        //
    }

    public function update(Request $request, Skill $skill)
    {
        //
    }

    public function destroy(Skill $skill)
    {
        //
    }
}
