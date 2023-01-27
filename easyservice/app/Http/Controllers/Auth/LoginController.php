<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Auth;
use App\User;
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
    protected $redirectTo ="/";

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    function redirectTo()
    {
          if(Auth::user()->role=='super-admin') 
        {
            return 'administration-vavavoom-onecall/home';
        }
        else if(Auth::user()->role=='admin' || Auth::user()->role=='gestionnaire_ticket')
        {
            return 'administration-vavavoom/homes';
        }
        else if(Auth::user()->role=='operatrice-appel'){
            return 'administration-operatrice/home'; 
        }
        else  if(Auth::user()->role=='gestionnaire')
        {
            return 'administration-vavavoom-gestionnaire/home'; 
        }
        else  if(Auth::user()->role=='commercial')
        {
            return 'administration-vavavoom-commercial/home'; 
        }
        else  if(Auth::user()->role=='developpeur')
        {
            return 'administration-vavavoom-technique/home'; 
        }
       
        else  if(Auth::user()->role=='user')
        {
            return 'client-vavavoom/homeclient'; 
        }
        else
        {
            return redirect('/login');
        }
    }
    
    protected function credentials(Request $request)
        {
          if(is_numeric($request->get('email'))){
            return ['telephone'=>$request->get('email'),'password'=>$request->get('password')];
          }
          elseif (filter_var($request->get('email'), FILTER_VALIDATE_EMAIL)) {
            return ['email' => $request->get('email'), 'password'=>$request->get('password')];
          }
          return ['username' => $request->get('email'), 'password'=>$request->get('password')];
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
