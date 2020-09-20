<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Model\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        if($request->method()=='GET')
            return view('login');
        // Validate the form data
        $this->validate($request, [
            'username'   => 'required|string|max:255|alpha_dash',
            'password' => 'required|min:6'
        ]);
        // Attempt to log the user in

        $remember = $request->remember==1?true:false;
        if (Auth::guard('web')->attempt(['username' => $request->username, 'password' => $request->password], $remember)) {
            // if successful, then redirect to their intended location

            $user = Auth::user();
            /**
             * Check first time login
             */
            if($user->is_first_login ==1)
            {
                //Auth::logout();
                //return view('admin.userinfo.newpasschange',['id'=>$user->id]);
                return redirect()->intended(route('upd_pass'));
            }

             if($user->sys_group_id==6 )
             {
                 return redirect()->intended(route('customer_dashboard'));
             }elseif($user->sys_group_id==7)
             {
                 return redirect()->intended(route('corporate_dashboard'));
             }else{
                 return redirect()->intended(route('admin_dashboard'));
             }

        }
        // if unsuccessful, then redirect back to the login with the form data
        return redirect()->back()->withInput($request->only('username', 'remember'))->with('message',__('Username Password is not matched'));
    }



    public function logout(){
        Auth::logout();
        return redirect()->route('login');
    }
}
