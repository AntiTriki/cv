<?php

namespace App\Http\Controllers;

use App\Form;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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
//        $pos = DB::table('postulations')->where('form_id',$cv->id)->get();
        $for = DB::table('forms')->get();
        $pos = DB::table('postulations')->get();
        $jo = DB::table('jobs')->get();
        $use = DB::table('users')->get();
        return view('home', ['cv'=>$cv,'jo'=>$jo,'pos'=>$pos,'for'=>$for,'use'=>$use]);
    }
    public function admin( )
    {
        $pos = DB::table('postulations')->get();
        $jo = DB::table('jobs')->get();
        $cat = DB::table('categories')->get();
        $for = DB::table('forms')->get();
        $use = DB::table('users')->get();
        return view('homeAdm', ['jo'=>$jo,'pos'=>$pos,'cat'=>$cat,'for'=>$for,'use'=>$use]);
    }

    public function redirect (Request $request){
        $id = $request->input('id');

        session()->put('user-id', $id);

        return redirect('index');
    }

}
