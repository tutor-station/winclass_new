<?php

namespace App\Http\Controllers;

use App\CourseClass;
use Illuminate\Http\Request;
use Notification;
use DB;
use App\CourseChapter;
use App\CourseSubject;
use App\Course;
use App\Order;
use App\User;
use App\Notifications\CourseNotification;
use App\Subtitle;
use Session;
use Storage;
use Auth;
use File;
use App\Setting;
use App\LiveClasses;
use Alaouy\Youtube\Facades\Youtube;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\OneSignalNotificationController;


class CourseclassController extends Controller
{
    public function __construct()
    {
    
        $this->middleware('permission:course-class.view', ['only' => ['index','show']]);
        $this->middleware('permission:course-class.create', ['only' => [ 'store']]);
        $this->middleware('permission:course-class.edit', ['only' => ['update','courseclassstatus']]);
        $this->middleware('permission:course-class.delete', ['only' => ['destroy', 'bulk_delete']]);
    
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courseclass = CourseClass::all();
        return view('admin.course.courseclass.index',compact("courseclass"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    { 
        // $test = OneSignalNotificationController->sendMyNotification();

        $request->validate([
            'video' => 'mimes:mp4,avi,wmv'
        ]);

        set_time_limit(0);
        ini_set('max_execution_time', 400);
        ini_set('memory_limit', '-1');


        $courseclass = new CourseClass;
        $courseclass->course_id = $request->course_id;
        $courseclass->coursechapter_id =  $request->course_chapters;
        $courseclass->title = $request->title;
        $courseclass->duration = $request->duration;
        $courseclass->status = $request->status;
        $courseclass->featured = $request->featured;
        $courseclass->video = $request->video;
        $courseclass->image = $request->image;
        $courseclass->zip = $request->zip;
        $courseclass->pdf = $request->pdf;
        $courseclass->size = $request->size;
        $courseclass->url = $request->url;
        $courseclass->date_time = $request->date_time;
        $courseclass->detail = $request->detail;
         $courseclass->checkVideo = $request->checkVideo;
         $courseclass->pro_class = $request->pro_class;


        $courseclass->user_id = Auth::user()->id;

        $courseclass['position'] = (CourseClass::count()+1);



        if($request->drip_type == "date")
        {
            $courseclass->drip_type = $request->drip_type; 
            $start_time = date('Y-m-d\TH:i:s', strtotime($request->drip_date));
            $courseclass->drip_date = $start_time; 
            $courseclass->drip_days = null;
           

        }
        elseif($request->drip_type == "days"){

            $courseclass->drip_type = $request->drip_type;
            $courseclass->drip_days = $request->drip_days;
            $courseclass->drip_date = null; 

        }
        else{

            $courseclass->drip_days = null;
            $courseclass->drip_date = null; 

        }

        

        if(isset($request->status))
        {
            $courseclass->status = '1';
        }
        else
        {
            $courseclass->status = '0';
        }
        

        if(isset($request->featured))
        {
            $courseclass->featured = '1';
        }
        else
        {
            $courseclass->featured = '0';
        }

        if(isset($request->pro_class))
        {
            $courseclass->pro_class = '1';
        }
        else
        {
            $courseclass->pro_class = '0';
        }
        
             
        if($request->type == "video")
        {
            $courseclass->type = "video";
                    
            if($request->checkVideo == "url")
            {
                $courseclass->url = $request->vidurl;
                $courseclass->video = null;
                $courseclass->iframe_url = null;
            }
            else if($request->checkVideo == "uploadvideo")
            {
                if($file = $request->file('video_upld'))
                {
                    $name = 'video_course_'.time().'.'.$file->getClientOriginalExtension();
                    $file->move('video/class',$name);
                    $courseclass->video = $name;
                    $courseclass->url = null;
                    $courseclass->iframe_url = null;
                }
            }

            else if($request->checkVideo == "iframeurl")
            {
                $courseclass->iframe_url = $request->iframe_url;
                $courseclass->url = null;
                $courseclass->video = null;
            }
            elseif($request->checkVideo == "liveurl")
            {
                $courseclass->url = $request->vidurl;
                $courseclass->video = null;
                $courseclass->iframe_url = null;
            }

            elseif($request->checkVideo == "aws_upload")
            {

                if($request->hasFile('aws_upload'))
                {

                    $file = request()->file('aws_upload');
                    $videoname = time() . '_'. $file->getClientOriginalName();

                    $t = Storage::disk('s3')->put($videoname, file_get_contents($file) , 'public');
                    $upload_video = $videoname;
                    $aws_url = env('AWS_URL') . $videoname;
                    

                    $videoname = Storage::disk('s3')->url($videoname);

                    $courseclass->aws_upload = $aws_url;
                }

            }

            elseif($request->checkVideo == "youtube")
            {
                $courseclass->url = $request->vidurl;
                $courseclass->video = null;
                $courseclass->iframe_url = null;
            }

            elseif($request->checkVideo == "vimeo")
            {
                $courseclass->url = $request->vidurl;
                $courseclass->video = null;
                $courseclass->iframe_url = null;
            }
        }

        

                    
        if(!isset($request->preview_type))
        {
            $courseclass['preview_url'] = $request->url;
            $courseclass['preview_type'] = "url";
        }
        else
        {
            if($file = $request->file('video'))
            {
                
              $filename = time().$file->getClientOriginalName();
              $file->move('video/class/preview',$filename);
              $courseclass['preview_video'] = $filename;
            }
            $courseclass['preview_type'] = "video";
        }



        if($request->type == "image")
        { 
            $courseclass->type = "image";

            if($request->checkImage == "url")
            {
                $courseclass->url = $request->imgurl;
                $courseclass->image = null;
            }
            else if($request->checkImage == "uploadimage")
            {
                if($file = $request->file('image'))
                {
                    $name = time().$file->getClientOriginalName();
                    $file->move('images/class',$name);
                    $courseclass->image = $name;
                    $courseclass->url = null;
                }
            }
        }


        if($request->type == "zip")
        {
            $courseclass->type = "zip";

            if($request->checkZip == "zipURLEnable")
            {
                $courseclass->url = $request->zipurl;
                $courseclass->zip = null;
            }
            else if($request->checkZip == "zipEnable")
            {
                if($file = $request->file('uplzip'))
                {
                    $name = time().$file->getClientOriginalName();
                    $file->move('files/zip',$name);
                    $courseclass->zip = $name;
                    $courseclass->url = null;
                }
            }
        } 


        if($request->type == "pdf")
        {
            $courseclass->type = "pdf";

            if($request->checkPdf == "pdfURLEnable")
            {
                $courseclass->url = $request->pdfurl;
                $courseclass->pdf = null;
            }
            elseif($request->checkPdf == "pdfEnable")
            {
                if($file = $request->file('pdf'))
                {
                    $name = time().$file->getClientOriginalName();
                    $file->move('files/pdf',$name);
                    $courseclass->pdf = $name;
                    $courseclass->url = null;
                }
            }
        }


        if($request->file('thumbnail_image'))
        {
            if($file = $request->file('thumbnail_image'))
            {
                $name = time().$file->getClientOriginalName();
                $file->move('images/class/thumbnails',$name);
                $courseclass->thumbnail_image = $name;
            }
        }



        if($request->type == "audio")
        {
            $courseclass->type = "audio";

            if($request->checkAudio == "audiourl")
            {
                $courseclass->url = $request->audiourl;
                $courseclass->audio = null;
            }
            elseif($request->checkAudio == "uploadaudio")
            {
                if($file = $request->file('audioupload'))
                {
                    $name = time().$file->getClientOriginalName();
                    $file->move('files/audio',$name);
                    $courseclass->audio = $name;
                    $courseclass->url = null;
                }
            }
        }

        if($file = $request->file('file')) 
        { 
          
          $path = 'files/class/material/';

          if(!file_exists(public_path().'/'.$path)) {
            
            $path = 'files/class/material/';
            File::makeDirectory(public_path().'/'.$path,0777,true);
          } 

          $filename = time().$file->getClientOriginalName();
          $file->move('files/class/material',$filename);
          $courseclass['file'] = $filename;
          
        }

        

        // Notification when course class add
        $cor = Course::where('id', $request->course_id)->first();

        $course = [
          'title' => $cor->title,
          'image' => $cor->preview_image,
        ];

        $enroll = Order::where('course_id', $request->course_id)->get();

        if(!$enroll->isEmpty())
        {
            foreach($enroll as $enrol)
            {
              if($courseclass->save()) 
              {
                $user = User::where('id', $enrol->user_id)->get();

                
                // print_r($result);exit;

                // Notification::send($user,new CourseNotification($course));
              }
            }

            $title = $cor->title;
            $message = "New Class is Added";
            $OneSignalNotificationController = app(OneSignalNotificationController::class);
            $result = $OneSignalNotificationController->sendMyNotification($title, $message, "", "", "", "", $cor->id);
        }
        else
        {
            $courseclass->save();
        }
          
        // Subtitle 
        if($request->has('sub_t')){
        foreach($request->file('sub_t') as $key=> $image)
          {
          
            $name = $image->getClientOriginalName();
            $image->move(public_path().'/subtitles/', $name);  
           
            $form= new Subtitle();
            $form->sub_lang = $request->sub_lang[$key];
            $form->sub_t=$name;
            $form->c_id = $courseclass->id;
            $form->save(); 
          }
        }

        return back()->with('success',trans('flash.AddedSuccessfully'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\courseclass  $courseclass
     * @return \Illuminate\Http\Response
     */
    public function show( $id)
    {
        
        $subtitles = Subtitle::where('c_id', $id)->get();
        $cate = CourseClass::find($id);
        $coursechapt = CourseChapter::where('course_id', $cate->course_id)->get();

        $datetimevalue= strtotime($cate->date_time);
        $formatted = date('Y-m-d', $datetimevalue);

        $pd = $cate['date_time'];
        $live_date = str_replace(" ", "T", $pd);

        return view('admin.course.courseclass.edit',compact('cate','coursechapt','subtitles', 'live_date')); 

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\courseclass  $courseclass
     * @return \Illuminate\Http\Response
     */
    public function edit(courseclass $courseclass)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\courseclass  $courseclass
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $request->validate([
            'video' => 'mimes:mp4,avi,wmv'
        ]);


        ini_set('max_execution_time', 400);

        $courseclass = CourseClass::findOrFail($id);

        $courseclass->coursechapter_id=$request->coursechapter_id;
        $courseclass->title = $request->title;
        $courseclass->duration = $request->duration;
        $courseclass->status = $request->status;
        $courseclass->featured = $request->featured;
        $courseclass->size = $request->size;
        $courseclass->date_time = $request->date_time;
        $courseclass->detail = $request->detail;
        $courseclass->pro_class = $request->pro_class;
         
        $coursefind  = CourseChapter::findOrFail($request->coursechapter);
        $maincourse = Course::findorfail($coursefind->course_id);


        if($request->drip_type == "date")
        {
            $courseclass->drip_type = $request->drip_type;
            $start_time = date('Y-m-d\TH:i:s', strtotime($request->drip_date));
            $courseclass->drip_date = $start_time; 
            $courseclass->drip_days = null;
           

        }
        elseif($request->drip_type == "days"){

            $courseclass->drip_type = $request->drip_type;
            $courseclass->drip_days = $request->drip_days;
            $courseclass->drip_date = null; 

        }
        else{

            $courseclass->drip_days = null;
            $courseclass->drip_date = null; 

        }
        

        if($request->type == "video")
        {

            $courseclass->type = "video";
                
            if($request->checkVideo == "url")
            {

                $courseclass->url = $request->vidurl;
                $courseclass->video = null;
                $courseclass->iframe_url = null;
                $courseclass->date_time = null;
                $courseclass->aws_upload = null;
            }

            else if($request->checkVideo == "uploadvideo")
            {

                if($file = $request->file('video_upld'))
                {
                    if($courseclass->video !="")
                    {
                        $content = @file_get_contents(public_path().'/video/class/'.$courseclass->video);

                        if ($content) {
                            unlink(public_path().'/video/class/'.$courseclass->video);
                        }
                    }
                
                    $name = 'video_course_'.time().'.'.$file->getClientOriginalExtension();
                    $file->move('video/class',$name);
                    $courseclass->video = $name;
                    $courseclass->url = null;
                    $courseclass->iframe_url = null;
                    $courseclass->date_time = null;
                    $courseclass->aws_upload = null;

                }
            }

            else if($request->checkVideo == "iframeurl")
            {
                $courseclass->iframe_url = $request->iframe_url;
                $courseclass->url = null;
                $courseclass->video = null;
                $courseclass->date_time = null;
                $courseclass->aws_upload = null;
            }
            elseif($request->checkVideo == "liveurl")
            {
                $courseclass->url = $request->vidurl;
                $courseclass->video = null;
                $courseclass->iframe_url = null;
                $courseclass->aws_upload = null;
            }
            elseif($request->checkVideo == "aws_upload")
            {

                if($request->hasFile('aws_upload'))
                {

                    $file = request()->file('aws_upload');
                    $videoname = time() . '_'. $file->getClientOriginalName();

                    $t = Storage::disk('s3')->put($videoname, file_get_contents($file) , 'public');
                    $upload_video = $videoname;
                    $aws_url = env('AWS_URL') . $videoname;
                    

                    $videoname = Storage::disk('s3')->url($videoname);

                    $courseclass->aws_upload = $aws_url;
                    $courseclass->video = null;
                    $courseclass->iframe_url = null;
                    $courseclass->date_time = null;
                }

            }
            elseif($request->checkVideo == "youtube")
            {
                $courseclass->url = $request->vidurl;
                $courseclass->video = null;
                $courseclass->iframe_url = null;
            }

            elseif($request->checkVideo == "vimeo")
            {
                $courseclass->url = $request->vidurl;
                $courseclass->video = null;
                $courseclass->iframe_url = null;
            }
        } 


        if($request->type == "audio")
        { 
            $courseclass->type = "audio";

            if($request->checkAudio == "audiourl")
            {
                $courseclass->url = $request->audiourl;
                $courseclass->audio = null;
            }
            else if($request->checkAudio == "uploadaudio")
            {
                if($file = $request->file('audio'))
                {
                    if($courseclass->audio !="")
                    {
                        $content = @file_get_contents(public_path().'/files/audio/'.$courseclass->audio);

                        if ($content) {
                            unlink(public_path().'/files/audio/'.$courseclass->audio);
                        }
                    }

                    $name = time().$file->getClientOriginalName();
                    $file->move('files/audio',$name);
                    $courseclass->audio = $name;
                    $courseclass->url = null;
                 }
            }

        } 


        if($request->type == "image")
        { 
            $courseclass->type = "image";

            if($request->checkImage == "url")
            {
                $courseclass->url = $request->imgurl;
                $courseclass->image = null;
            }
            else if($request->checkImage == "uploadimage")
            {
                if($file = $request->file('image'))
                {
                    if($courseclass->image !="")
                    {
                        $content = @file_get_contents(public_path().'/images/class/'.$courseclass->image);

                        if ($content) {
                            unlink(public_path().'/images/class/'.$courseclass->image);
                        }
                    }

                    $name = time().$file->getClientOriginalName();
                    $file->move('images/class',$name);
                    $courseclass->image = $name;
                    $courseclass->url = null;
                 }
            }

        } 

        if($request->type == "zip")
        {

            $courseclass->type = "zip";

            if($request->checkZip == "zipURLEnable")
            {
                $courseclass->url = $request->zipurl;
                $courseclass->zip = null;
            }
            else if($request->checkZip == "zipEnable")
            {
                if($file = $request->file('uplzip'))
                {
                    $content = @file_get_contents(public_path().'/files/zip/'.$courseclass->zip);

                    if ($content) {
                        unlink(public_path().'/files/zip/'.$courseclass->zip);
                    }

                    $name = time().$file->getClientOriginalName();
                    $file->move('files/zip',$name);
                    $courseclass->zip = $name;
                    $courseclass->url = null;
                }
            }
        }


        if($request->type == "pdf")
        {
            $courseclass->type = "pdf";

            if($request->checkPdf == "url")
            {
                $courseclass->url = $request->pdfurl;
                $courseclass->pdf = null;
            }
            else if($request->checkPdf == "uploadpdf")
            {
                if($file = $request->file('pdf'))
                {
                    $content = @file_get_contents(public_path().'/files/pdf/'.$courseclass->pdf);

                    if ($content) {
                        unlink(public_path().'/files/pdf/'.$courseclass->pdf);
                    }
        
                    
                    $name = time().$file->getClientOriginalName();
                    $file->move('files/pdf',$name);
                    $courseclass->pdf = $name;
                    $courseclass->url = null;
                 }
            }
        }




        if(isset($request->preview_type))
        {
          $courseclass['preview_type'] = "video";
        }
        else
        {
          $courseclass['preview_type'] = "url";
        }

        
        if(!isset($request->preview_type))
        {
            $courseclass->preview_url = $request->preview_url;
            $courseclass->preview_video = null;
            $courseclass['preview_type'] = "url";
            
        }
        else
        {
            
            if($file = $request->file('video'))
            {
                // return $request;
              if($courseclass->preview_video != "")
              {
                $content = @file_get_contents(public_path().'/video/class/preview/'.$courseclass->preview_video);
                if ($content) {
                  unlink(public_path().'/video/class/preview/'.$courseclass->preview_video);
                }
              }
              
              $filename = time().$file->getClientOriginalName();
              $file->move('video/class/preview',$filename);
              $courseclass['preview_video'] = $filename;
              $courseclass->preview_url = null;

              $courseclass['preview_type'] = "video";

            }
        }

        if($file = $request->file('file'))
        {
            $path = 'files/class/material/';

            if(!file_exists(public_path().'/'.$path)) {
                
                $path = 'files/class/material/';
                File::makeDirectory(public_path().'/'.$path,0777,true);
            } 

            if($courseclass->file != "")
            {
                $class_file = @file_get_contents(public_path().'/files/class/material/'.$courseclass->file);

                if($class_file)
                {
                    unlink('files/class/material/'.$courseclass->file);
                }
            }
            $name = time().$file->getClientOriginalName();
            $file->move('files/class/material', $name);
            $courseclass['file'] = $name;
        }
        

        if(isset($request->status))
        {
            $courseclass['status'] = '1';
        }
        else
        {
            $courseclass['status'] = '0';
        }

        if(isset($request->featured))
        {
            $courseclass['featured'] = '1';
        }
        else
        {
            $courseclass['featured'] = '0';
        }

        if(isset($request->pro_class))
        {
            $courseclass['pro_class'] = '1';
        }
        else
        {
            $courseclass['pro_class'] = '0';
        }


        $courseclass->save();
        Session::flash('success',trans('flash.UpdatedSuccessfully'));
        return redirect()->route('course.show',$maincourse->id); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\courseclass  $courseclass
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $courseclass = CourseClass::find($id);

        if($courseclass->type == "video")
        {
                
            $video_file = @file_get_contents(public_path().'/video/class/'.$courseclass->video);

            if($video_file)
            {
                unlink(public_path().'/video/class/'.$courseclass->video);
            }
        }

        if($courseclass->type == "audio")
        {
                
            $video_file = @file_get_contents(public_path().'/files/audio/'.$courseclass->audio);

            if($video_file)
            {
                unlink(public_path().'/files/audio/'.$courseclass->audio);
            }
        }

        if($courseclass->type == "image")
        {
                
            $image_file = @file_get_contents(public_path().'/images/class/'.$courseclass->image);

            if($image_file)
            {
                unlink(public_path().'/images/class/'.$courseclass->image);
            }
        }

        if($courseclass->type == "zip")
        {
                
            $zip_file = @file_get_contents(public_path().'/files/zip/'.$courseclass->zip);

            if($zip_file)
            {
                unlink(public_path().'/files/zip/'.$courseclass->zip);
            }
        }

        if($courseclass->type == "pdf")
        {
                
            $pdf_file = @file_get_contents(public_path().'/files/pdf/'.$courseclass->pdf);

            if($pdf_file)
            {
                unlink(public_path().'/files/pdf/'.$courseclass->pdf);
            }
        }

        if($courseclass->preview_type = "video")
        {
            $content = @file_get_contents(public_path().'/video/class/preview/'.$courseclass->preview_video);
            if($content) {
              unlink(public_path().'/video/class/preview/'.$courseclass->preview_video);
            }
        }

        $courseclass->delete();
        
        return back();
    }


    public function sort(Request $request){
        return $request;
        $posts = CourseClass::all();

        foreach ($posts as $post) {
            foreach ($request->order as $order) {

                if($order['id'] == $post->id) {
                    \DB::table('course_classes')->where('id',$post->id)->update(['position' => $order['position']]);
                    
                }
            }
        }
        return response()->json('Update Successfully.', 200);

       
    }
    public function bulk_delete(Request $request)
    {
     
           $validator = Validator::make($request->all(), ['checked' => 'required']);
           if ($validator->fails()) {
            return back()->with('error',trans('Please select field to be deleted.'));
           }
           CourseClass::whereIn('id',$request->checked)->delete();

          return back()->with('error',trans('Selected CourseClass has been deleted.'));

          
   }


   public function courseclassstatus($id)
    {
        $courseclass = CourseClass::findorfail($id);

        if($courseclass->status ==0)
        {
            DB::table('course_classes')->where('id','=',$id)->update(['status' => "1"]); 
            return back()->with('success','Status changed to active !');
        }
        else
        {
            DB::table('course_classes')->where('id','=',$id)->update(['status' => "0"]);
            return back()->with('delete','Status changed to deactive !');
        }
    }

    public function courseclassfeatured($id)
    {
        $courseclass = CourseClass::findorfail($id);

        if($courseclass->featured ==0)
        {
            DB::table('course_classes')->where('id','=',$id)->update(['featured' => "1"]); 
            return back()->with('success','Status changed to active !');
        }
        else
        {
            DB::table('course_classes')->where('id','=',$id)->update(['featured' => "0"]);
            return back()->with('delete','Status changed to deactive !');
        }
    }
   public function upload(Request $request){
    
    if($file = $request->file('video'))
    {
        
      $filename = time().$file->getClientOriginalName();
      $file->move('video/class/preview',$filename);
      $courseclass['video_upld'] = $filename;
    }
    $courseclass['video_upld'] = "video";
   }



   public function getAllComments($id)
    {
        $classDetail = CourseClass::where('id', $id)->first();

        $gsettings = Setting::first();

         // echo '<pre>'; print_r($gsettings->default_link_url);exit;

        $classDetails = json_decode($classDetail, true);
        
        return view('admin.course.courseclass.comments', compact('id', 'classDetails', 'gsettings'));

    }

    
    public function getAllCommentsReturn(Request $request)
    {

        $comments = DB::table('comments')
            ->leftJoin('users', 'users.id', '=', 'comments.user_id')
            ->select('comments.*', 'users.fname as user_name', 'users.user_img')
            ->where('comments.course_class_id', $request->course_class_id)
            ->when($request->has('LastId'), function ($query) use ($request) {
                return $query->where('comments.id', '>', $request->LastId);
            })
            ->orderBy('comments.id', 'ASC')
            ->get();

            
        $comments = json_decode($comments, true);

        $gsettings = Setting::first();
        $default_url =  $gsettings->default_link_url;
        
        $html = '';
        if(!empty($comments)){
            foreach ($comments as $key => $value) {
                $iCommentId = $value['id'];
                $sImageName = $default_url."images/user_img/".$value['user_img'];
                $html .= '<div class="d-flex justify-content-center row">
                                <div class="col-md-12">
                                    <div class="d-flex flex-column comment-section" id="myGroup-'. $iCommentId .'">
                                        <div class="bg-white p-2">

                                            <div class="d-flex flex-row user-info"><img class="rounded-circle" src="'.$sImageName.'" width="40">

                                                <div class="d-flex flex-column justify-content-start ml-2"><span style="font-size: 24px;" class="d-block font-weight-bold name">'. $value['user_name'] .'</span><span class="date text-black-50">'.date("d-M-Y h:i A",strtotime($value['created_at'] )).'</span></div>
                                            </div>
                                           
                                            <div class="mt-2">';

                                            if($value['chat_type'] == 1){
                                             $html .= '<p class="comment-text">&nbsp; &nbsp;&nbsp; &nbsp;'.$value['comments'].'.</p>';
                                            }

                                            $html .= '<hr></div>
                                        </div>
                                    </div> 
                                </div>
                            </div>';
            }
        }
            
        return array('html' => $html, 'lastId' => $iCommentId) ;
    }




    public function getAllLiveClasses()
    {

        $items = LiveClasses::where('status', 'A')
                        ->groupBy('classgroup')
                        ->orderBy('id', 'DESC')
                        ->get(); 
        // echo '<pre>'; print_r($items);exit;
        return view('admin.course.courseclass.liveclasses',compact('items'));

    }


    public function createLiveClass()
    {
        $courses = Course::all();
        $coursechapters = CourseChapter::all();
        $show = CourseClass::where('checkVideo', 'liveurl')->get();
        
        return view('admin.course.courseclass.createLiveClass',compact('show', 'coursechapters', 'courses'));
    }


    public function getChapterByCourseId(Request $request)
    {
        
        $course_id = $request['courseId'];
        $chapter = CourseChapter::where('course_id', $course_id)->pluck('chapter_name', 'id')->all();

        return response()->json($chapter);
    }

    public function storeLiveClass(Request $request)
    { 
        set_time_limit(0);
        ini_set('max_execution_time', 400);
        ini_set('memory_limit', '-1');

        $lastRecord = LiveClasses::orderBy('id', 'desc')->first(['classgroup']);

        if ($lastRecord) {
            $lastRecordArray = $lastRecord->toArray();
            $classgroups = $lastRecordArray['classgroup'] + 1;
        } else {
            $classgroups = 1;
        }

        if ($request->hasFile('thumbnail_image')) {
            $file = $request->file('thumbnail_image');
            $name_thumbnail = time() . $file->getClientOriginalName();
            $file->move('images/class/thumbnails', $name_thumbnail);
            
        }

        if ($request->hasFile('pdf_with_annotation')) {
            $file = $request->file('pdf_with_annotation');
            $name_pdf_with_annotation = time() . $file->getClientOriginalName();
            $file->move('images/class/pdf_with_annotation', $name_pdf_with_annotation);
            
        }

        if ($request->hasFile('pdf_without_annotation')) {
            $file = $request->file('pdf_without_annotation');
            $name_pdf_without_annotation = time() . $file->getClientOriginalName();
            $file->move('images/class/pdf_without_annotation', $name_pdf_without_annotation);
            
        }


        foreach ($request->coursegroup as $key => $value) {
            $courseclass = new LiveClasses;
            $courseclass->course_id = $value['courseid'];
            $courseclass->chapter_id = $value['chapter_id'];
            $courseclass->subject_id = isset($value['topic_id']) && $value['topic_id'] != "" ? $value['topic_id'] : 0;
            $courseclass->title = $request->title;
            $courseclass->status = $request->has('status') ? 'A' : 'I';
            $courseclass->url = $request->url;
            $courseclass->date = $request->date;
            $courseclass->time = $request->time;
            $courseclass->desc = $request->detail;
            $courseclass->pro_class = $request->has('pro_class') ? '1' : '0';
            $courseclass->user_id = Auth::user()->id;
            $courseclass->video_type = $request->video_type;
            $courseclass->classgroup = $classgroups;
            $courseclass->order_no = LiveClasses::count() + 1;
            $courseclass->thumbnail = $name_thumbnail;
            $courseclass->pdf_with_annotations = (isset($name_pdf_with_annotation) && $name_pdf_with_annotation != "") ? $name_pdf_with_annotation : "";
            $courseclass->pdf_without_annotations = (isset($name_pdf_without_annotation) && $name_pdf_without_annotation != "") ? $name_pdf_without_annotation : "";

            $course = Course::where('id', $value['courseid'])->first();

            if ($course) {
                $enrollments = Order::where('course_id', $value['courseid'])->pluck('user_id');
                if ($enrollments->isNotEmpty()) {
                    foreach ($enrollments as $userId) {
                        $user = User::find($userId);
                        if ($user) {
                            Notification::send($user, new CourseNotification($course));
                        }
                    }
                }
            }

            $courseclass->save();
        }

        return redirect()->route('liveclass')->with('success', trans('flash.AddedSuccessfully'));
    }

    public function liveClassEdit($id)
    {
    
        $show = LiveClasses::select('*')
                        ->where('classgroup', $id)
                        ->where('status', 'A')
                        ->get()->toArray();

        $preData = array();
        $i = 0;
        foreach ($show as $key => $value) {
            $preData['title'] = $value['title'];
            $preData['video_type'] = $value['video_type'];
            $preData['thumbnail'] = $value['thumbnail'];
            $preData['live_stream'] = $value['live_stream'];
            $preData['date'] = $value['date'];
            $preData['time'] = $value['time'];
            $preData['classgroups'] = $value['classgroup'];
            $preData['url'] = $value['url'];
            $preData['pro_class'] = $value['pro_class'];
            $preData['desc'] = $value['desc'];
            $preData['pdf_with_annotations'] = $value['pdf_with_annotations'];
            $preData['pdf_without_annotations'] = $value['pdf_without_annotations'];
            $preData['status'] = $value['status'];
            $preData['user_id'] = $value['user_id'];
            $preData['created_at'] = $value['created_at'];
            $preData['updated_at'] = $value['updated_at'];
            $preData['classgroup'][$i]['course_id'] = $value['course_id'];
            $preData['classgroup'][$i]['chapter_id'] = $value['chapter_id'];
            $preData['classgroup'][$i]['subject_id'] = $value['subject_id'];
            $i++;
        }

        // $show =  LiveClasses::where('classgroup', $id)->first();
        $courses = Course::all();
        $CourseChapter = CourseChapter::all();
        $CourseSubject = CourseSubject::all();
        // echo '<pre>'; print_r($preData);exit;
        return view('admin.course.courseclass.liveClassEdit',compact('preData', 'courses', 'CourseChapter', 'CourseSubject'));
    }



    // public function updateliveClass(Request $request)
    // {
        
    //     ini_set('max_execution_time', 400);

    //     $id = $request->id;
    //     $liveClass = LiveClasses::findOrFail($id);

    //     $liveClass->course_id = implode(', ', $request->courseid);
    //     $liveClass->title = ($request->title != "") ? $request->title : $liveClass->title;
    //     $liveClass->url = ($request->url != "") ? $request->url : $liveClass->url;
    //     $liveClass->status = ($request->status != "") ? $request->status : $liveClass->status;
    //     $liveClass->date = ($request->date != "") ? $request->date : $liveClass->date;
    //     $liveClass->time = ($request->time != "") ? $request->time : $liveClass->time;
    //     $liveClass->desc = ($request->desc != "") ? $request->desc : $liveClass->desc;
    //     $liveClass->pro_class = ($request->pro_class != "") ? $request->pro_class : $liveClass->pro_class;
    //     $liveClass->video_type = ($request->video_type != "") ? $request->video_type : $liveClass->video_type;
          

    //     if(isset($request->status))
    //     {
    //         $liveClass['status'] = 'A';
    //     }
    //     else
    //     {
    //         $liveClass['status'] = 'I';
    //     }

    //     if(isset($request->pro_class))
    //     {
    //         $liveClass['pro_class'] = '1';
    //     }
    //     else
    //     {
    //         $liveClass['pro_class'] = '0';
    //     }


    //     if($request->file('thumbnail'))
    //     {
    //         if($file = $request->file('thumbnail'))
    //         {
    //             $name = time().$file->getClientOriginalName();
    //             $file->move('images/class/thumbnails',$name);
    //             $liveClass->thumbnail = $name;
    //         }
    //     }

    //     if($request->file('pdf_with_annotation'))
    //     {
    //         if($file = $request->file('pdf_with_annotation'))
    //         {
    //             $name = time().$file->getClientOriginalName();
    //             $file->move('images/class/pdf_with_annotation',$name);
    //             $liveClass->pdf_with_annotations = $name;
    //         }
    //     }

    //     if($request->file('pdf_without_annotation'))
    //     {
    //         if($file = $request->file('pdf_without_annotation'))
    //         {
    //             $name = time().$file->getClientOriginalName();
    //             $file->move('images/class/pdf_without_annotation',$name);
    //             $liveClass->pdf_without_annotations = $name;
    //         }
    //     }

    //     $liveClass->save();

    //     Session::flash('success',trans('flash.UpdatedSuccessfully'));
    //     return redirect()->route('liveclass'); 
    // }



    public function updateliveClass(Request $request)
    {
        // Print request data for debugging
        // echo '<pre>'; print_r($request->all()); exit;

        // Set the maximum execution time
        ini_set('max_execution_time', 400);

        // Retrieve the LiveClass instances by classgroup
        $classgroup = $request->classgroup; // Assuming this is passed in the request
        $liveClasses = LiveClasses::where('classgroup', $classgroup)->get();

        // Handle file uploads and assign names
        $name_thumbnail = null;
        $name_pdf_with_annotation = null;
        $name_pdf_without_annotation = null;

        if ($request->hasFile('thumbnail_image')) {
            $file = $request->file('thumbnail_image');
            $name_thumbnail = time() . '_' . $file->getClientOriginalName();
            $file->move('images/class/thumbnails', $name_thumbnail);
        }

        if ($request->hasFile('pdf_with_annotation')) {
            $file = $request->file('pdf_with_annotation');
            $name_pdf_with_annotation = time() . '_' . $file->getClientOriginalName();
            $file->move('images/class/pdf_with_annotation', $name_pdf_with_annotation);
        }

        if ($request->hasFile('pdf_without_annotation')) {
            $file = $request->file('pdf_without_annotation');
            $name_pdf_without_annotation = time() . '_' . $file->getClientOriginalName();
            $file->move('images/class/pdf_without_annot
                ation', $name_pdf_without_annotation);
        }

        // Iterate through coursegroup data
        foreach ($request->coursegroup as $key => $value) {

            $courseId = $value['courseid'];
            $chapterId = $value['chapter_id'];
            $topicId = isset($value['topic_id']) && $value['topic_id'] != "" ? $value['topic_id'] : 0;

            if (empty($courseId)) {

                $new_id = $request->id; // Assuming new_id is passed in the request

                // Find the LiveClass instances to update
                $liveClassesToUpdate = LiveClasses::where('classgroup', $new_id)->get();
                foreach ($liveClassesToUpdate as $liveClass) {
                    $liveClass->title = $request->title;
                    $liveClass->status = $request->has('status') ? 'A' : 'I';
                    $liveClass->url = $request->url;
                    $liveClass->date = $request->date;
                    $liveClass->time = $request->time;
                    $liveClass->desc = $request->detail;
                    $liveClass->pro_class = $request->has('pro_class') ? '1' : '0';
                    $liveClass->user_id = Auth::user()->id;
                    $liveClass->video_type = $request->video_type;
                    $liveClass->classgroup = $request->id;
                    if ($name_thumbnail) $liveClass->thumbnail = $name_thumbnail;
                    if ($name_pdf_with_annotation) $liveClass->pdf_with_annotations = $name_pdf_with_annotation;
                    if ($name_pdf_without_annotation) $liveClass->pdf_without_annotations = $name_pdf_without_annotation;

                    $liveClass->save();
                }
            } else {
                // Create a new LiveClass instance
                $courseClass = new LiveClasses();
                $courseClass->course_id = $courseId;
                $courseClass->chapter_id = $chapterId;
                $courseClass->subject_id = $topicId;
                $courseClass->title = $request->title;
                $courseClass->status = $request->has('status') ? 'A' : 'I';
                $courseClass->url = $request->url;
                $courseClass->date = $request->date;
                $courseClass->time = $request->time;
                $courseClass->desc = $request->detail;
                $courseClass->pro_class = $request->has('pro_class') ? '1' : '0';
                $courseClass->user_id = Auth::user()->id;
                $courseClass->video_type = $request->video_type;
                $courseClass->classgroup = $request->id;
                $courseClass->order_no = LiveClasses::count() + 1;
                $courseClass->thumbnail = $name_thumbnail;
                $courseClass->pdf_with_annotations = $name_pdf_with_annotation;
                $courseClass->pdf_without_annotations = $name_pdf_without_annotation;

                $courseClass->save();


                // Notify enrolled users about the new course class
                $course = Course::where('id', $courseId)->first();
                if ($course) {
                    $enrollments = Order::where('course_id', $courseId)->pluck('user_id');
                    if ($enrollments->isNotEmpty()) {
                        foreach ($enrollments as $userId) {
                            $user = User::find($userId);
                            if ($user) {
                                Notification::send($user, new CourseNotification($course));
                            }
                        }
                    }
                }


                $new_id = $request->id; // Assuming new_id is passed in the request

                // Find the LiveClass instances to update
                $liveClassesToUpdate = LiveClasses::where('classgroup', $new_id)->get();
                foreach ($liveClassesToUpdate as $liveClass) {
                    $liveClass->title = $request->title;
                    $liveClass->status = $request->has('status') ? 'A' : 'I';
                    $liveClass->url = $request->url;
                    $liveClass->date = $request->date;
                    $liveClass->time = $request->time;
                    $liveClass->desc = $request->detail;
                    $liveClass->pro_class = $request->has('pro_class') ? '1' : '0';
                    $liveClass->user_id = Auth::user()->id;
                    $liveClass->video_type = $request->video_type;
                    $liveClass->classgroup = $request->id;
                    if ($name_thumbnail) $liveClass->thumbnail = $name_thumbnail;
                    if ($name_pdf_with_annotation) $liveClass->pdf_with_annotations = $name_pdf_with_annotation;
                    if ($name_pdf_without_annotation) $liveClass->pdf_without_annotations = $name_pdf_without_annotation;

                    $liveClass->save();
                }

            }
        }

        // Flash success message and redirect
        Session::flash('success', trans('flash.UpdatedSuccessfully'));
        return redirect()->route('liveclass');
    }


}
