<?php

namespace App\Http\Controllers;

use App\Level;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class LevelController extends Controller
{

    public function index()
    {
        return view('form.enterprise');
    }


    public function create()
    {
        //
    }

    public function store(Request $request)
    {
//        aqui agregar condicion de actualizar skills
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
