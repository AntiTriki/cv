<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

//    protected $redirectTo = '/home';
    public function redirectTo(){


        $today = Carbon::now();

        DB::table('jobs')->where('validity','<=',$today)->update([
            'activo' => 0
        ]);
        DB::table('postulations')->where( 'fecha_insert', '<', Carbon::now())->update([
            'activo' => 0
        ]);

        // User role
        $role = Auth::user()->permiso;

        // Check user role
        switch ($role) {
            case '1':
                return '/homeAdm';
                break;
            case '2':
                return '/home';
                break;
            default:
                return '/login';
                break;
        }

    }
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
