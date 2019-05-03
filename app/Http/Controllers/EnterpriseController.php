<?php

namespace App\Http\Controllers;

use App\Enterprise;
use App\Role;
use Illuminate\Database\Console\Migrations\RollbackCommand;
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
        $role = Role::where('form_id',$id)->get();
        $enter = DB::table ('enterprises')->get();
        return view('form.enterprise',compact('form','role','enter'));
    }

    public function create(Request $request)
    {
        DB::table('enterprises')->insert([
           'nombre_empresa' => $request-> input('nombre_empresa'),
            'nombre_jefe' => $request->input('nombre_jefe'),
            'role' => $request->input('role'),
            'mail_jefe' => $request->input('mail_jefe'),
            'cargo' => $request->input('cargo'),
            'cel_jefe' => $request->input('cel_jefe'),
            'fecha_inicio' => $request->input('fecha_inicio'),
            'fecha_fin' => $request->input('fecha_fin')
        ]);
        $idEnt = DB::table('enterprises')->select('id');
//        return "id habrr $idEnt";

        DB::table('roles')->insert([
            'enterprise_id' => $idEnt,
            'form_id' => $request->input('form_id'),
            'descripcion' => $request->input('descripcion')
        ]);

        return back();
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
