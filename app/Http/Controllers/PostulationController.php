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
        $cat = DB::table('categories')->get();
        $for = DB::table('forms')->get();
        $use = DB::table('users')->get();
        return view('form.postulant', ['jo'=>$jo,'pos'=>$pos,'cat'=>$cat,'for'=>$for,'use'=>$use]);
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
