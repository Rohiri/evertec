<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

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

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * Sobreescribimos el metodo authenticated para
     * redireccionar segun el Rol.
     * @param  [type] $request [description]
     * @param  [type] $user    [description]
     * @return [type]          [description]
     */
    public function authenticated($request , $user){
        //Si el usuario tiene rol admin redirige al dashboard
        if($user->role=='admin'){
            return redirect()->route('admin.dashboard') ;
        }
        //Si el usuario es un cliente redirige a las ordenes
        return redirect()->route('orders');
    }
}
