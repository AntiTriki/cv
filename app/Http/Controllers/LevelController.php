<?php

namespace App\Http\Controllers;

use App\Level;
use Illuminate\Http\Request;

class LevelController extends Controller
{

    public function index()
    {
        return view('enterprise');
//        $id=Auth::user()->id;
//        $forms = Form::where('user_id',$id)->get();
//        $basicos = DB::table('skills')->get();
//        return view('skills',['basicos' => $basicos],compact('forms'));
//
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
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Level  $level
     * @return \Illuminate\Http\Response
     */
    public function show(Level $level)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Level  $level
     * @return \Illuminate\Http\Response
     */
    public function edit(Level $level)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Level  $level
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Level $level)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Level  $level
     * @return \Illuminate\Http\Response
     */
    public function destroy(Level $level)
    {
        //
    }
//    public function addMorePost(Request $request)
//    {
//        $rules = [];
//
//
//        foreach($request->input('name') as $key => $value) {
//            $rules["name.{$key}"] = 'required';
//        }
//
//
//        $validator = Validator::make($request->all(), $rules);
//
//
//        if ($validator->passes()) {
//
//
//            foreach($request->input('name') as $key => $value) {
//                TagList::create(['name'=>$value]);
//            }
//
//
//            return response()->json(['success'=>'done']);
//        }
//
//
//        return response()->json(['error'=>$validator->errors()->all()]);
//    }
}
