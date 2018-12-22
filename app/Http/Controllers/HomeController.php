<?php

namespace App\Http\Controllers;

use App\Form;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id=Auth::user()->id;
        $forms = Form::where('user_id',$id)->get();
        return view('home',compact('forms'));
    }
}
