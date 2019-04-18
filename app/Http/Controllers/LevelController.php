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
        return view('form.enterprise',compact('title','form'));
    }


    public function create()
    {
        //
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
