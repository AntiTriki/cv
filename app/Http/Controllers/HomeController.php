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

    public function index()
    {
        $usu = Session('usu-id');
        $forms = Form::where('user_id',$usu)->get();
        return view('home',compact('forms'));
    }

}
