<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\User;
use App\MobileOtpVerify;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Laravel\Passport\Client;
use App\Setting;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;
use App\Mail\verifyEmail;
use App\Mail\WelcomeUser;
use Illuminate\Support\Facades\Mail;
use Session;

use App\Http\Controllers\Api\VerificationController;
class RegisterController extends Controller
{
    use IssueTokenTrait;

	private $client;

	public function __construct(){
		$this->client = Client::find(2);
	}

    // public function register(Request $request){

    // 	$this->validate($request, [
    // 		'name' => 'required',
    // 		'email' => 'required|email|unique:users,email',
    // 		'password' => 'required|min:6'
    // 	]);
    	
    // 	$config = Setting::first();

    // 	if($config->mobile_enable == 1){
    	    
    // 	    $request->validate([
    // 	           'mobile' => 'required|numeric'
    // 	    ]);
    	    
    // 	}
    	
    //     if($config->verify_enable == 0)
    //     {
    //         $verified = \Carbon\Carbon::now()->toDateTimeString();
    //     }
    //     else
    //     {
    //         $verified = NULL;
    //     }

    // 	$user = User::create([
    	    
    // 		'fname' => request('name'),
    // 		'email' => request('email'),
    //         'email_verified_at'  => $verified,
    //         'mobile' => $config->mobile_enable == 1 ? request('mobile') : NULL,
    // 		'password' => bcrypt(request('password')),

    // 	]);
    //     $user->assignRole('User');
    //     if($config->verify_enable == 0)
    //     {
    //         return $this->issueToken($request, 'password');  
    //     }
    //     else
    //     {
    //         if($verified != NULL)
    //         {
    //             return $this->issueToken($request, 'password');  
    //         }
    //         else
    //         {
    //            $user->sendEmailVerificationNotificationViaAPI();
    //            Mail::to(request('email'))->send(new WelcomeUser($user));
    //            return response()->json('Verify your email', 402); 
    //         }
            
    //     }
    //     if($config->w_email_enable == 1){
    //       try{
    //             Mail::to(request('email'))->send(new WelcomeUser($user));
    //             return response()->json('Registration done.', 200);
    //         }
    //         catch(\Exception $e){
    //             return response()->json('Registration done. Mail cannot be sent', 201);
    //         }
    //     }
    // }


    public function register(Request $request){

        if($request['fname'] == "" || empty($request['fname'])){
            return response()->json('First Name is Required', 400);
        }

        if($request['lname'] == "" || empty($request['lname'])){
            return response()->json('Last Name is Required', 400);
        }

        if($request['email'] == "" || empty($request['email'])){
            return response()->json('Email is Required', 400);
        }

        if($request['password'] == "" || empty($request['password'])){
            return response()->json('password is Required', 400);
        }
     
        $config = Setting::first();
    

        if($config->verify_enable == 0)
        {
            $verified = \Carbon\Carbon::now()->toDateTimeString();
        }
        else
        {
            $verified = NULL;
        }
        
        $otpData = MobileOtpVerify::where('id', $request['mobile_id'])->first();

        $user = User::create([
            'fname' => request('fname'),
            'email' => request('email'),
            'lname' => request('lname'),
            'email_verified_at'  => $verified,
            'mobile' => $otpData->mobile,
            'password' => bcrypt(request('password')),
        ]);
        

        $user->assignRole('User');
        if($config->verify_enable == 0)
        {
            return $this->issueToken($request, 'password');  
        }
        else
        {
            if($verified != NULL)
            {
                return $this->issueToken($request, 'password');  
            }
            else
            {
               $user->sendEmailVerificationNotificationViaAPI();
               Mail::to(request('email'))->send(new WelcomeUser($user));
               return response()->json('Verify your email', 402); 
            }
            
        }
        if($config->w_email_enable == 1){
          try{
                Mail::to(request('email'))->send(new WelcomeUser($user));
                return response()->json('Registration done.', 200);
            }
            catch(\Exception $e){
                return response()->json('Registration done. Mail cannot be sent', 201);
            }
        }
    }



    public function otp_verify(Request $request){

            
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

        $otpData = MobileOtpVerify::where('otp', $request->otp)->first();
        $otpDataArray = json_decode($otpData, true);
        
        if(empty($otpDataArray)){
            $re = array(
                'result'            => 0,
                'msg'               => "InCorrect Otp",
            );
            return response()->json($re, 200); 
        }

        
        $otpData = MobileOtpVerify::where('mobile', $request['mobile'])->first();
        if($otpData){
            $MobileOtpVerify = MobileOtpVerify::where('mobile', $request['mobile'])->update([
                               'status' => 0
                            ]);
        }
        
        $re = array(
                "result"            => 1,
                "msg"               => "Otp Verify Successfully!!",
                "mobile_id"         => $otpData->id
            );

        return response()->json($re, 200);
    }

   

    public function verifyemail(Request $request){
        $user = User::where(['email' => $request->email, 'verifyToken' => $request->token])->first();
        if($user){
            $user->status=1; 
            $user->verifyToken=NULL;
            $user->save();
            Mail::to($user->email)->send(new WelcomeUser($user));
            return $this->issueToken($request, 'password');
        }else{
            return response()->json('user not found', 401);
        }
    }




    public function SendOtp(Request $request){
        
        
        $mobile = $request->mobile;

        $userData = User::where("mobile", $mobile)->first();
        if(!empty($userData)){
            $re = array(
                'result'            => 0,
                'msg'               => "Number is already Registerd"
            );
            return response()->json($re, 200);
        }
        $com_code = substr(str_shuffle("0123456789"),0,6);

        if($com_code)
        {

            $otpData = MobileOtpVerify::where('mobile', $mobile)->first();

            if($otpData){
                $MobileOtpVerify = MobileOtpVerify::where('mobile', $mobile)->update([
                                   'otp' => $com_code,
                                   'status' => 1
                                ]);
            }else{
                $MobileOtpVerify = MobileOtpVerify::create([
                    'mobile' => $mobile,
                    'otp' => $com_code,
                    'status' => 1
                ]);
            }
        }

        $message = "Dear User,\nYour OTP for registration in the Ummeed Classes App is ".$com_code." Don't Share it with Anyone.\n Ummeed Classes.\nFrom  Tutor Station";

        $re = array();
        if($MobileOtpVerify){
            $msgRes = self::SendSms($mobile,$message,'1107169174117417056');

            $re = array(
                'result'            => 1,
                'msg'               => "Otp Send Successfully!!"
            );

        }

        
        return response()->json($re, 200);
    }



    function SendSms($iMobileNumber,$sMessage,$template_id=""){ 
        //echo $sMessage;
        $SMS_USER_ID   = 'tutorstation';
        $SMS_PASSWORD   = 'Tutor@2610';
        $SMS_SENDER_ID   = 'TUTSTN';

        $sms_post_query_str = "userId=$SMS_USER_ID&password=$SMS_PASSWORD&senderId=$SMS_SENDER_ID&sendMethod=simpleMsg&msgType=unicode&mobile=$iMobileNumber&msg=$sMessage&duplicateCheck=true&format=json&dltTemplateId=$template_id";
        //$HTML = file_get_contents($sUrl);
        //echo $HTML;
        //exit;

        

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