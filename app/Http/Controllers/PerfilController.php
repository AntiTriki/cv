<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Image;

class PerfilController extends Controller
{
    public function index()
    {
        return view('imagen',array('user' => Auth::user()));
    }
    public function store(Request $request)
    {
        if($request->hasFile('image')){
            $image = $request -> file('image');
            $filename = time() .'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(300,300)->save(public_path('img/faces/'.$filename));

            $user = Auth::user();
            $user->image = $filename;
            $user->save();
        }
            return view('imagen',array('user' => Auth::user()));

    }
    public function destroy()
    {

    }
}
