<?php

namespace App\Http\Controllers;


use App\Form;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\User;
use App\Name;

class UsuarioController extends Controller
{

//    public function index()
//    {
//        $id = Session('usu-id');
//        $usuario = DB::table('users')->where('id','=',$id)->get();
//        return view('edit/profile',['usuario' => $usuario]);
//    }

    public function edit($id)
    {

        $user = User::find($id);
        $civil = Name::findOrFail([5,6,7,8]);
        return view('edit.profile',compact('user','civil'));
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

    public function update(Request $request,$id)
    {
            $user = User::find($id);
            $user->name = $request->input('name');
            $user->apellido_p = $request->input('apellido_p');
            $user->apellido_m = $request->input('apellido_m');
            $user->ci = $request->input('ci');
            $user->birthday = $request->input('fnacimiento');
            $user->nacionalidad = $request->input('nacionalidad');
            $user->residencia = $request->input('residencia');
            $user->celular = $request->input('celular');
            $user->telefono = $request->input('telefono');
            $user->email = $request->input('mail');
            $user->sexo = $request->input('sexo');
            $user->children = $request->input('hijos');
            $user->civil = $request->input('civil');
            $user->drivecard = $request->input('licencia');
            $user->save();

        $form = Form::where('user_id', '=', $id)->first();

        if($form == null){
            return redirect('/home/form/curriculum');
        }
        else {
            return redirect('/home/form/index/'.$user->id);

        }

    }


    public function destroy($id)
    {
        //
    }
}
