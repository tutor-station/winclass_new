<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;  
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Laravel\Passport\Client;
use Laravel\Passport\HasApiTokens;
use App\User;
use App\Setting;
use Mail;
use Validator;
use Hash;
use Socialite;
use App\ForgotOtpVerify;

class LoginController extends Controller
{

    use IssueTokenTrait;

	private $client;

	public function __construct(){
		$this->client = Client::find(2);
	}

    // public function login(Request $request)
    // {

    // 	$this->validate($request, [
    // 		'email' => 'required',
    // 		'password' => 'required'
    // 	]);
        
    //     $authUser = User::where('email', $request->email)->first();
    //     if(isset($authUser) && $authUser->status == 0){
    //         return response()->json('Blocked User', 401); 
    //     }
    //     else{



    //         $setting = Setting::first();

    //         if(isset($authUser))
    //         {
    //             if($setting->verify_enable == 0)
    //             {
    //                 if(isset($request->role))
    //                 {
    //                     if($authUser->role == 'instructor')
    //                     {
    //                         return $this->issueToken($request, 'password');
    //                     }
    //                     else{
    //                         return response()->json('Invalid Login', 404);  
    //                     }
    //                 }
    //                 else{
    //                     return $this->issueToken($request, 'password');  
    //                 }

                      
    //             }
    //             else
    //             {
    //                 if($authUser->email_verified_at != NULL)
    //                 {
    //                     if(isset($request->role))
    //                     {
    //                         if($authUser->role == 'instructor')
    //                         {
    //                             return $this->issueToken($request, 'password');
    //                         }
    //                         else{
    //                             return response()->json('Invalid Login', 404);  
    //                         }
    //                     }
    //                     else{
    //                         return $this->issueToken($request, 'password');
    //                     }
                        

                          
    //                 }
    //                 else
    //                 {
    //                     return response()->json('Verify your email', 402); 
    //                 }
    //             }

    //         }
    //         else{

    //             return response()->json('invalid User login', 401);

    //         }

            
            
    //     }

    // }

    public function username()
    {
        return 'mobile';
    }

    public function login(Request $request)
    {
        
        if($request->mobile == "" && $request->password == "" ){
            return response()->json('please enter credential', 401);
        }
        
        if($request->mobile == ""){
            return response()->json('please enter mobile number', 401);
        }

        if($request->password == ""){
            return response()->json('please enter password', 401);
        }
        
        $authUser = User::where('mobile', $request->mobile)->first();
        
        // if(!empty($authUser) && $authUser->device_id != ""  && $authUser->device_id != $request->device_id){
        //     return response()->json('Device Id InCorrect', 401);
        // }

        if(isset($authUser) && $authUser->status == 0){
            return response()->json('Blocked User', 401); 
        }
        else
        {

            if(isset($authUser))
            {
                if(empty($authUser->email))
                {
                    return response()->json('Email id is Not Updated.. Please Contact Admin.', 401);
                }
                else
                {
                    $request->email = $authUser->email;

                    return $this->issueToken2($request, 'password');
                //return $this->issueToken2($request, 'client_credentials');
                }
                

            }
            else
            {

                return response()->json('invalid User login', 401);

            }
 
        }

    }

    public function fblogin(Request $request){

        $this->validate($request, [
            'email' => 'required',
            'name' => 'required',
            'code' => 'required',
            'password' => ''
        ]);
        $authUser = User::where('email', $request->email)->first();
        if($authUser){
            $authUser->facebook_id = $request->code;
            $authUser->fname = $request->name;
            $authUser->save();
            if(isset($authUser) &&  $authUser->status == '0'){
                return response()->json('Blocked User', 401); 
            }
             else{
                   if (Hash::check('password', $authUser->password)) {

                        return $response = $this->issueToken($request,'password');

                } else {
                    $response = ["message" => "Password mismatch"];
                    return response($response, 422);
                }

            }
        }
        else{

            $verified = \Carbon\Carbon::now()->toDateTimeString();

            $user = User::create([
                'fname' =>  request('name'),
                'email' => request('email'),
                'password' => Hash::make($request->password !='' ? $request->password : 'password'),
                'facebook_id' => request('code'),
                'status'=>'1',
                'email_verified_at'  => $verified
            ]);
            
            return $this->issueToken($request, 'password');
        }
    }

    public function googlelogin(Request $request){


        $this->validate($request, [
            'email' => 'required',
            'name' => 'required',
            'uid' => 'required',
            'password' => ''
        ]);

        $authUser = User::where('email', $request->email)->first();

        if($authUser){

            $authUser->google_id = $request->uid;
            $authUser->fname = $request->name;
            $authUser->save();

            if(isset($authUser) &&  $authUser->status == '0'){
                return response()->json('Blocked User', 401); 
            }
            else{
                if (Hash::check('password', $authUser->password)) {
                    return $response = $this->issueToken($request,'password');

                } else {
                    $response = ["message" => "Password mismatch"];
                    return response($response, 422);
                }

            }
        }
        else{
            $verified = \Carbon\Carbon::now()->toDateTimeString();
            $user = User::create([
                'fname' =>  request('name'),
                'email' => request('email'),
                'password' => Hash::make($request->password !='' ? $request->password : 'password'),
                'google_id' => request('uid'),
                'status'=>'1',
                'email_verified_at'  => $verified
            ]);
           
            return $response = $this->issueToken($request, 'password');
        }
    }



    public function refresh(Request $request){
        
    	$this->validate($request, [
    		'refresh_token' => 'required'
    	]);

    	return $this->issueToken2($request, 'refresh_token');
    }
    
    public function forgotApi(Request $request)
    { 
        $user = User::whereEmail($request->email)->first();
        if($user){

            $uni_col = array(User::pluck('code'));
            do {
              $code = str_random(5);
            } while (in_array($code, $uni_col));            
            try{
                $config = Setting::findOrFail(1);
                $logo = $config->logo;
                $email = $config->wel_email;
                $company = $config->project_title;
                Mail::send('forgotemail', ['code' => $code, 'logo' => $logo, 'company'=>$company], function($message) use ($user, $email) {
                    $message->from($email)->to($user->email)->subject('Reset Password Code');
                });
                $user->code = $code;
                $user->save();
                return response()->json('ok', 200);
            }
            catch(\Swift_TransportException $e){
                return response()->json('Mail Sending Error', 400);
            }
        }
        else{          
            return response()->json('user not found', 401);  
        }
    }

    public function verifyApi(Request $request)
    { 
        if( ! $request->code || ! $request->email)
        {
            return response()->json('email and code required', 449);
        }

        $user = User::whereEmail($request->email)->whereCode($request->code)->first();

        if( !$user)
        {            
            return response()->json('not found', 401);
        }
        else{
            $user->code = null;
            $user->save();
            return response()->json('ok', 200);
        }
    }

    public function resetApi(Request $request)
    { 

        $validator = Validator::make($request->all(), [
            'password' => 'required|confirmed|min:6',
        ]);

        $user = User::whereEmail($request->email)->first();

        if($user){

            $user->update(['password' => bcrypt($request->password)]);

            $user->save(); 
            
            return response()->json('ok', 200);
        }
        else{          
            return response()->json('not found', 401);
        }
    }

    public function logoutApi()
    {

        return $token = Auth::user()->token();
        $token->revoke();
        $response = ['message' => 'You have been successfully logged out!'];
        return response($response, 200);

    }

    public function redirectToblizzard_sociallogin($provider){
        return Socialite::driver($provider)->stateless()->redirect();
    }


    public function blizzard_sociallogin(Request $request, $provider)
    {

        if(!$request->has('code') || $request->has('denied')) {
            return response()->json('Code not found !', 401); 
        }


        try{

           return Socialite::driver($provider)->stateless()->user();

        }catch(\Exception $e){

           return response()->json($e->getMessage(),401);
        }

        $authUser = $this->findOrCreateUser($user, $provider);
        if(isset($authUser) &&  $authUser->status == '0'){
            return response()->json('Blocked User', 401); 
        }

        else{

             $token = $authUser
                     ->createToken(config('app.name') . ' Password Grant Client')
                     ->accessToken;

            return response()->json(['accessToken' => $token], 200); 



        }

        


        // return $token
    }

    public function findOrCreateUser($user, $provider)
    {
        if($user->email == Null){
            $user->email = $user->id.'@facebook.com';
        }

        $authUser = User::where('email', $user->email)->first();
        $providerField = "{$provider}_id";

        if($authUser){
            if ($authUser->{$providerField} == $user->id) {
                $authUser->email_verified_at = \Carbon\Carbon::now()->toDateTimeString();
                $authUser->save();
                return $authUser;
            }
            else{
                $authUser->{$providerField} = $user->id;
                $authUser->email_verified_at = \Carbon\Carbon::now()->toDateTimeString();
                $authUser->save();
                return $authUser;
            }
        }

        if($user->avatar != NULL && $user->avatar != ""){
            $fileContents = @file_get_contents($user->getAvatar());
            $user_profile = File::put(public_path() . '/images/user_img/' . $user->getId() . ".jpg", $fileContents);
            $name = $user->getId() . ".jpg";
        }
        else {
            $name = NULL;
        }

        $verified = \Carbon\Carbon::now()->toDateTimeString();

        $setting = Setting::first();

        $auth_user = User::create([
            'fname'              => $user->name,
            'email'              => $user->email,
            'user_img'           => $name,
            'email_verified_at'  => $verified,
            'password'           => Hash::make('password'),
            $providerField       => $user->id,
        ]);


        if($setting->w_email_enable == 1){
            try{
               
                Mail::to($auth_user['email'])->send(new WelcomeUser($auth_user));
               
            }
            catch(\Swift_TransportException $e){

            }
        }



        return $auth_user;



    }



    public function forgotSendOtp(Request $request){
        

        $mobile = $request->mobile;

        $userData = User::where("mobile", $mobile)->first();
        if(empty($userData)){
            $re = array(
                'result'            => 0,
                'msg'               => "This Number is Not Registerd"
            );
            return response()->json($re, 200);
        }
        $com_code = substr(str_shuffle("0123456789"),0,6);

        if($com_code)
        {

            $otpData = ForgotOtpVerify::where('mobile', $mobile)->first();

            if($otpData){
                $ForgotOtpVerify = ForgotOtpVerify::where('mobile', $mobile)->update([
                                   'otp' => $com_code,
                                   'status' => 1
                                ]);
            }else{
                $ForgotOtpVerify = ForgotOtpVerify::create([
                    'mobile' => $mobile,
                    'otp' => $com_code,
                    'status' => 1
                ]);
            }
        }

        $message = "Dear User,\nYour OTP for resetting your password in the Ummeed Classes App is ".$com_code.". Don't Share it with Anyone. Ummeed Classes."."\nFrom Tutor Station";

        $re = array();
        if($ForgotOtpVerify){
            $msgRes = self::SendSms($mobile,$message,'1107169174126268781');

            $re = array(
                'result'            => 1,
                'msg'               => "Otp Send Successfully!!"
            );

        }

        
        return response()->json($re, 200);
    }


    public function forgotOtpVerify(Request $request){

            
        if($request['mobile'] == "" || empty($request['mobile'])){
            $re = array(
                'result'            => 0,
                'msg'               => "Mobile Number is Required.",
            );
            return response()->json($re, 200); 
        }
        
        if($request->otp == ""){
            $re = array(
                    'result'            => 0,
                    'msg'               => "Please Enter Otp",
                );
            return response()->json($re, 200); 
        }

        $otpData = ForgotOtpVerify::where('otp', $request->otp)->first();
        $otpDataArray = json_decode($otpData, true);
        
        if(empty($otpDataArray)){
            $re = array(
                'result'            => 0,
                'msg'               => "InCorrect Otp",
            );
            return response()->json($re, 200); 
        }

        
        $otpData = ForgotOtpVerify::where('mobile', $request['mobile'])->first();
        if($otpData){
            $ForgotOtpVerify = ForgotOtpVerify::where('mobile', $request['mobile'])->update([
                               'status' => 0
                            ]);
        }
        
        $re = array(
                "result"            => 1,
                "msg"               => "Otp Verify Successfully!!",
                "mobile"            => $request['mobile'],
                "mobile_id"            => $otpData->id
            );

        return response()->json($re, 200);
    }



    public function resetPassword(Request $request){
            
        if($request['mobile'] == "" || empty($request['mobile'])){
            $re = array(
                'result'            => 0,
                'msg'               => "Mobile Number is Required.",
            );
            return response()->json($re, 200); 
        }
        
        if($request->password == ""){
            $re = array(
                    'result'            => 0,
                    'msg'               => "Please Enter Password",
                );
            return response()->json($re, 200); 
        }

        $ForgotOtpVerify = User::where('mobile', $request['mobile'])->update([
                               'password' => bcrypt($request['password'])
                            ]);
        
        $re = array(
                "result"            => 1,
                "msg"               => "Password Reset Successfully!!"
            );

        return response()->json($re, 200);
    }
    


    function SendSms($iMobileNumber,$sMessage,$template_id=""){ 
        //echo $sMessage;
        $SMS_USER_ID   = 'tutorstation';
        $SMS_PASSWORD   = 'Tutor@2610';
        $SMS_SENDER_ID   = 'TUTSTN';

        $sms_post_query_str = "userId=$SMS_USER_ID&password=$SMS_PASSWORD&senderId=$SMS_SENDER_ID&sendMethod=simpleMsg&msgType=unicode&mobile=$iMobileNumber&msg=$sMessage&duplicateCheck=true&format=json&dltTemplateId=$template_id";

          $curl = curl_init();
          curl_setopt_array($curl, array(CURLOPT_URL => "http://enterprise.smsgatewaycenter.com/SMSApi/rest/send",
                                         CURLOPT_RETURNTRANSFER => true,
                                         CURLOPT_ENCODING => "",
                                         CURLOPT_MAXREDIRS => 10,
                                         CURLOPT_TIMEOUT => 30,
                                         CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                                         CURLOPT_CUSTOMREQUEST => "POST",
                                         CURLOPT_POSTFIELDS => $sms_post_query_str,
                                         CURLOPT_HTTPHEADER => array("cache-control: no-cache", "content-type: application/x-www-form-urlencoded"),
                                        ));       
          $response = curl_exec($curl);
          $err = curl_error($curl);
          curl_close($curl);

          if ($err) {
            echo "cURL Error #:" . $err;
          } else {
            $response;
          }
          //echo $response;exit;
        $arrTemp = json_decode($response,1);
     
    }
    
}
