<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
// use Illuminate\Support\Facades\Notification;
use App\Notifications\OfferPushNotifications;
use Session;
use DotenvEditor;
use Spatie\Permission\Models\Role;
use App\Notification;
use DB;
use Image;
use Carbon\Carbon;
use App\Http\Controllers\CourseclassController;

class OneSignalNotificationController extends Controller
{
    public function __construct()
    {
		$this->middleware('permission:push-notification.manage', ['only' => ['index','updateKeys','push']]);
    }
    public function index()
    {
        return view('admin.push_notification.index');   
    }


    public function push(Request $request)
    {
        // print_r($request->schedule_time);exit;
        ini_set('max_excecution_time', -1);

        ini_set('memory_limit', -1);

        $request->validate([
            'title' => 'required|string',
            'message' => 'required'
        ]);

        try {

            if ($file = $request->file('image')) 
            {            
              $optimizeImage = Image::make($file);
              $optimizePath = public_path().'/images/notifications/';
              $image = time().$file->getClientOriginalName();
              $optimizeImage->save($optimizePath.$image, 72);         
              
            }

            $result = $this->sendMyNotification($request->title, $request->message, $request->description, $image, $request->is_scheduled, $request->schedule_time);

            return back()->with('success',trans('flash.AddedSuccessfully'));

        } catch (\Exception $e) {

             \Session::flash('delete', $e->getMessage());
            return back()->withInput();

        }

    }

    public function updateKeys(Request $request){

        $request->validate([
            'ONESIGNAL_APP_ID' => 'required|string',
            'ONESIGNAL_REST_API_KEY' => 'required|string'
        ],[
            'ONESIGNAL_APP_ID.required' => 'OneSignal app id is required',
            'ONESIGNAL_REST_API_KEY.required' => 'Onesignal rest api key is required'
        ]);


        $env_update = DotenvEditor::setKeys([
            'ONESIGNAL_APP_ID' => $request->ONESIGNAL_APP_ID,
            'ONESIGNAL_REST_API_KEY' => $request->ONESIGNAL_REST_API_KEY
        ]);

        $env_update->save();
        

        \Session::flash('success', 'Keys updated successfully !');
        return back();
    }


    function sendMyNotification($title=false, $message=false, $description=false, $image=false, $is_schedule=false, $schedule_time=false, $course_id = false){


        $ONESIGNAL_APP_ID = "2b8fd812-6af8-49b7-9665-97f57cedb785";
        $ONESIGNAL_REST_KEY = "NjFkNmE2NWUtZDgwZi00ZWM5LThjM2YtZjY3NjQ1N2IwYjNj";

        $carbonDate = Carbon::parse($schedule_time);

        // Format the date-time as desired
        $formattedDateTime = $carbonDate->format('Y-m-d H:i:s');

        if($title != ""){
            $title = $title;
        }

        if($message != ""){
            $message = $message;
        }

        if($description != ""){
            $description = $description;
        }
        
        if($image != ""){
            $image = $image;
        }
        
        if($is_schedule != ""){
            $is_schedule = $is_schedule;
        }

        if($schedule_time != ""){
            $schedule_time = $formattedDateTime;
        }

        // echo '<pre>';print_r($formattedDateTime);exit;
        $input = [
            'title' => $title,
            'message' => $message,
            'description' => $description,
            'image_thumbs' => $image,
            'noti_date' => date("Y-m-d"),
            'is_scheduled' => ($is_schedule != "") ? "Y" : "N",
            'schedule_time' => $schedule_time,
            'course_id' => ($course_id != "") ? $course_id : "",
        ];

        $data = Notification::create($input); 
        $InsertId = $data->id;
        if($image != ""){
            $imgName = "https://ummeedclasses.tutorstation.in/images/notifications/".$image;
        }else{
            $imgName = "";
        }
        
        $arrNotification['id'] = $InsertId;
        $arrNotification['title'] = $title;
        $arrNotification['description'] = $description;
        $arrNotification['message'] = $message;
        $arrNotification['image_thumbs'] = $imgName; 


        $arrMessage = array(
          'app_id' => $ONESIGNAL_APP_ID,
          'included_segments' => array('All'),                                           
          'data' => array("foo" => "bar","type"=>'',"post_id"=>$InsertId,"title"=>htmlentities($title),"external_link"=>'','description'=>htmlentities($description),'timestamp'=>date('Y-m-d G:i:s')),
          'headings'=> array("en" => htmlentities($title)),
          'contents' => array("en" => htmlentities($message)),
          'big_picture' =>$imgName                    
        );

        if(isset($is_schedule) && $is_schedule=="Y" && !empty($schedule_time) )
        {
            $arrMessage['send_after'] = "$formattedDateTime GMT+5:30";
            $arrMessage['priority'] = "10";
        }


        $fields = json_encode($arrMessage);

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://onesignal.com/api/v1/notifications");
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json; charset=utf-8',
        'Authorization: Basic '.$ONESIGNAL_REST_KEY));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_HEADER, FALSE);
        curl_setopt($ch, CURLOPT_POST, TRUE);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
    
        $response = curl_exec($ch);

        curl_close($ch);
        $arrResponse = json_decode($response);
        // echo '<pre>'; print_r($arrResponse);exit; 
        $iOneSignalNotificationId = $arrResponse->id;

        $arrDetails = array(
            'one_signal_notification_id' => $iOneSignalNotificationId
        );

        DB::table('notification')->where('notification_id', $InsertId)->update($arrDetails);
    }

}
