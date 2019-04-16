<?php

namespace App\Http\Controllers;

use App\Form;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index( )
    {
        $id_user=Auth::user()->id;
        $cv = Form::where('user_id', '=', $id_user)->first();
        return view('home', ['cv' => $cv]);
    }

    public function redirect (Request $request){
        $id = $request->input('id');

        session()->put('user-id', $id);

        return redirect('index');
    }

}
