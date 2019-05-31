<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Image;
use Illuminate\Support\Facades\Validator;



class PerfilController extends Controller
{
    public function index()
    {
        return view('imagen',array('user' => Auth::user()));
    }


    public function store(Request $request)
    {
            if($request->hasFile('image')){

               $request->validate([
                    'image' => 'required|mimes:jpeg,jpg,png'
                ]);

                $image = $request -> file('image');
                $filename = time() .'.'.$image->getClientOriginalExtension();
                Image::make($image)->resize(300,300)->save(public_path('img/faces/'.$filename));

                $user = Auth::user();
                $user->image = $filename;
                $user->save();

//
//            }else{
//                $notification = array(
//                    'message' => 'Error de formato',
//                    'alert-type' => 'error');
//                return view('imagen',array('user' => Auth::user()))->with($notification);
            }
        $notification = array(
                    'message' => 'Modificado Correctamente',
                    'alert-type' => 'success');
                return view('imagen',array('user' => Auth::user()))->with($notification);
    }

    public function destroy()
    {

    }
}
