<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
Use Alert;


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

    public function login(Request $request)
    {   
        $input = $request->all();
   
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|min:8',
        ]);

        //$login_type = filter_var($email, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
   
        if(auth()->attempt(array('email' => $input['email'], 'password' => $input['password'])))
        {
            if (auth()->user()->is_admin == 1) {
                return redirect()->route('admin.home')->withSuccess('Welcome '.auth()->user()->name);
            }else{
                return redirect()->route('home')->withSuccess('Welcome '.auth()->user()->name);
                // if (auth()->user()->email_verified_at != null) {
                //     return redirect()->route('home')->withSuccess('Welcome '.auth()->user()->name);
                // } else {
                //     return view('auth.verify');
                // }
            }
        }else{
            return redirect()->route('login')
                ->with('toast_error','Email-Address And Password Are Wrong.');
        }
          
    }
}
