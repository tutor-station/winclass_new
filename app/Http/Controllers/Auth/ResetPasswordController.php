<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;
use App\MobileOtpVerify;
use App\User;

class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
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
        $this->middleware('guest');
    }


    public function resetNewPassword($id)
    {

        $data = MobileOtpVerify::where('id', $id)->first();
        // echo '<pre>';print_r();exit;
        $mobile = $data->mobile;
        return view('quedecato.front.auth.passwords.reset',compact('mobile'));
        
    }


    public function updateNewPassword()
    {
        // print_r($_REQUEST);exit;
        $mobile = $_REQUEST['mobile'];
        $password = $_REQUEST['password'];

        $data = User::where('mobile', $mobile)->first();
        // echo '<pre>';print_r($data);exit;
        if(!empty($data)){
            $UpdateNewPassword = User::where('mobile', $mobile)->update([
                                   'password' =>  bcrypt($password)
                                ]);
            $re = array(
                "result"            => 1,
                "msg"               => "Password Update Successfully!!"
            );
        }else{
            $re = array(
                "result"            => 0,
                "msg"               => "User Not Found"
            );
        }

        return response()->json($re, 200);

    }

}
