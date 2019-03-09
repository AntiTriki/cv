<?php

namespace App\Http\Controllers;

use App\Form;
use App\Level;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;



class FormController extends Controller
{

    public function index()
    {
        $id = Session('usu-id');
        $cv = Form::where('user_id',$id)->get();
        return view('form.index',compact('cv'));
    }
  public function skills($id)
    {
        //

        $form = Form::findOrFail($id);
        return view('form.skills', compact('form'));

    }

    public function redir()
    {
        return redirect('/index');
    }

    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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

    /**
     * Display the specified resource.
     *
     * @param  \App\Form  $form
     * @return \Illuminate\Http\Response
     */
    public function show(Form $form)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Form  $form
     * @return \Illuminate\Http\Response
     */
    public function edit(Form $form)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Form  $form
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Form $form)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Form  $form
     * @return \Illuminate\Http\Response
     */
    public function destroy(Form $form)
    {
        //
    }

}
