<?php

namespace App\Http\Controllers;

use App\Postulation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class PostulationController extends Controller
{
    public function index($id)
    {
        $pos = Postulation::findOrFail($id);
        $jo = DB::table('jobs')->get();
        $for = DB::table('forms')->get();
        $use = DB::table('users')->get();
        $ti = DB::table('titles')->get();
        $gra = DB::table('grades')->get();
        $rol = DB::table('roles')->get();
        $ente = DB::table('enterprises')->get();
        $level = DB::table('levels')->get();
        $sk = DB::table('skills')->get();
        $nivel = DB::table('names')->get();
        return view('form.postulant', ['jo'=>$jo,'pos'=>$pos,'for'=>$for,'use'=>$use,'ti'=>$ti,'gra'=>$gra,'rol'=>$rol,'ente'=>$ente,'level'=>$level,'sk'=>$sk,'nivel'=>$nivel]);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Postulation $postulation)
    {
        //
    }

    public function edit(Postulation $postulation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Postulation  $postulation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Postulation $postulation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Postulation  $postulation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Postulation $postulation)
    {
        //
    }
}
