<?php

namespace App\Http\Controllers;

use App\Enterprise;
use Illuminate\Http\Request;

use App\Form;
use App\Level;
use App\Title;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class EnterpriseController extends Controller
{
    public function index($id)
    {
        $form = Form::findOrFail($id);
        return view('form.enterprise',compact('form'));
    }

    public function create()
    {
        //
    }

    public function edit(Enterprise $enterprise)
    {
        //
    }

    public function update(Request $request, Enterprise $enterprise)
    {
        //
    }
}
