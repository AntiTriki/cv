<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\User;

class UsuarioController extends Controller
{

    public function index()
    {
        $id = Session('usu-id');
        $usuario = DB::table('users')->where('id','=',$id)->get();
        return view('edit/profile',['usuario' => $usuario]);
    }


    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'apellido_p' => ['required', 'string', 'max:255'],
            'apellido_m' => ['required', 'string', 'max:255'],
            'ci' => ['required', 'string', 'max:10', 'unique:users'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'nacionalidad' => ['required', 'string', 'max:100'],
            'residencia' => ['required', 'string', 'max:100']
        ]);
    }

    public function update(Request $request)
    {
        $id = $request->input('pk-usuario');
        DB::table('users')->where('id', $id)->update([
                'name' => $request->input('name'),
                'apellido_p' => $request->input('apellido_p'),
                'apellido_m' => $request->input('apellido_m'),
                'ci' => $request->input('ci'),
                'birthday' => $request->input('fnacimiento'),
                'nacionalidad' => $request->input('nacionalidad'),
                'residencia' => $request->input('residencia'),
                'celular' => $request->input('celular'),
                'telefono' => $request->input('telefono'),
                'email' => $request->input('mail'),
                'sexo' => $request->input('sexo'),
                'children' => $request->input('hijos'),
                'civil' => $request->input('civil'),
                'drivecard' => $request->input('licencia')
            ]
        );
        return back();
    }


    public function destroy($id)
    {
        //
    }
}
