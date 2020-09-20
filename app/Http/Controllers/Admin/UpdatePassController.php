<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UpdatePassController extends Controller
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

    public function changePass(Request $request)
    {
        $user = Auth::user();
        return view('admin.userinfo.newpasschange',['id'=>$user->id]);
    }



    public function passwordChange(Request $request)
    {
        $rules = [

            'password'              => 'required|string|min:6',
            'password_confirmation' => 'required|min:6|same:password'
        ];

        $message=[
            'password_confirmation.required' =>'Password Confirmation is required',
            'password_confirmation.same' => 'Confirm Password not match with password'

        ];
        $this->validate($request, $rules,$message);

        /**
         * Check user name already exist
         */



        $isExist = User::find($request->input('id'));

        if(empty($isExist))
        {
            session()->flash('message', 'No user found ');
            session()->flash('class', '1');
            return redirect()->route('login');
        }

        $isExist->password  = bcrypt($request->input('password'));
        $isExist->is_first_login  = 0;
        $isExist->save();

        Auth::logout();
        session()->flash('message', 'Password Updated Successfully !');
        session()->flash('class', '1');
        return redirect()->intended(route('login'));

    }
}
