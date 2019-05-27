<?php

namespace App\Http\Controllers;

use App\Form;
use App\Jobs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

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
//        dd(carbon::now()->addDays(30));

//        DB::table('postulations')->where( 'fecha_insert', '<', Carbon::now())->update([
//            'activo' => 0
//        ]);

        return view('home', ['cv'=>$cv,'jo'=>$jo,'pos'=>$pos,'for'=>$for,'use'=>$use]);
    }
    public function admin()
    {
        $pos = DB::table('postulations')->get();
//        $today = Carbon::now();
//        $jo = DB::table('jobs')->where('validity','>',$today)->get();
        $jo = DB::table('jobs')->orderBy('activo', 'desc')->get();
        $cat = DB::table('categories')->get();
        $for = DB::table('forms')->get();
        $use = DB::table('users')->get();

//        $today = Carbon::now();
//            DB::table('jobs')->where('validity','<=',$today)->update([
//                'activo' => 0
//            ]);

        return view('homeAdm', ['jo'=>$jo,'pos'=>$pos,'cat'=>$cat,'for'=>$for,'use'=>$use]);
    }

    public function redirect (Request $request){
        $id = $request->input('id');

        session()->put('user-id', $id);

        return redirect('index');
    }

}
