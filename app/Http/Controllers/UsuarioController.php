<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UsuarioController extends Controller
{

    public function index()
    {
        $id = Session('usu-id');
        $usuario = DB::table('users')->where('id','=',$id)->get();
        return view('edit/profile',['usuario' => $usuario]);
    }


    public function create()
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
