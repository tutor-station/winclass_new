<?php

namespace App\Http\Controllers;

use App\CourseChapter;
use Illuminate\Http\Request;
use DB;
use App\Course;
use Session;
use Image;
use Auth;
use Exception;
use Illuminate\Support\Facades\Validator;
use PhpParser\Node\Stmt\TryCatch;
use Spatie\Permission\Models\Role;
use App\CourseSubject;

class CourseSubjectController extends Controller
{
    public function __construct()
    {
    
        // $this->middleware('permission:course-chapter.view', ['only' => ['index','show']]);
        // $this->middleware('permission:course-chapter.create', ['only' => [ 'store']]);
        // $this->middleware('permission:course-chapter.edit', ['only' => [ 'update','coursechapterstatus']]);
        // $this->middleware('permission:course-chapter.delete', ['only' => ['destroy', 'bulk_delete']]);
    
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $coursesubject = CourseChapter::where('course_id','DESC')->get();
        return view('admin.course.coursesubject.index',compact("coursesubject"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $data = $this->validate($request,[
            'title' => 'required',
        ]);
        
        if(isset($request->status))
        {
            $status = "1";
        }
        else
        {
            $status = "0";
        }

        $data = CourseSubject::create([
            'title' => $request->title,
            'course_id' => $request->course_id,
            'chapter_id' => $request->chapter_id,
            'status' => $status,
        ]);

        Session::flash('success',trans('flash.AddedSuccessfully'));
        return redirect()->route('course.show',$request->course_id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\coursechapter  $coursechapter
     * @return \Illuminate\Http\Response
     */
    public function show( $id)
    {
        $cate = CourseChapter::find($id);
        $courses = Course::all();
        return view('admin.course.coursechapter.edit',compact('cate','courses'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\coursechapter  $coursechapter
     * @return \Illuminate\Http\Response
     */
    public function edit(coursechapter $coursechapter)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\coursechapter  $coursechapter
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {

        // return $request;

        $data = $this->validate($request,[
            'chapter_name' => 'required',
        ]);

        $data = CourseChapter::findorfail($id);
        $input = $request->all();


        if($request->drip_type == "date")
        {
            $start_time = date('Y-m-d\TH:i:s', strtotime($request->drip_date));
            $input['drip_date'] = $start_time; 
            $input['drip_days'] = null;
           

        }
        elseif($request->drip_type == "days"){

            $input['drip_days'] = $request->drip_days;
            $input['drip_date'] = null; 

        }
        else{

            $input['drip_days'] = null;
            $input['drip_date'] = null; 

        }

        if(isset($request->status))
        {
          $input['status'] = "1";
        }
        else
        {
          $input['status'] = "0";
        }

        if($file = $request->file('file'))
        {
            if($data->file != "")
            {
                $chapter_file = @file_get_contents(public_path().'/files/material/'.$data->file);

                if($chapter_file)
                {
                    unlink('files/material/'.$data->file);
                }
            }
            $name = time().$file->getClientOriginalName();
            $file->move('files/material', $name);
            $input['file'] = $name;
        }

        $data->update($input);

        Session::flash('success',trans('flash.UpdatedSuccessfully'));
        return redirect()->route('course.show',$request->course_id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\coursechapter  $coursechapter
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $coursechapter = CourseChapter::find($id);

        if ($coursechapter->file != null)
          {
                
            $image_file = @file_get_contents(public_path().'/files/material/'.$coursechapter->file);

            if($image_file)
            {
                unlink(public_path().'/files/material/'.$coursechapter->file);
            }
        }

        DB::table('course_chapters')->where('id',$id)->delete();
        DB::table('course_classes')->where('coursechapter_id',$id)->delete();
        return back(); 
    }

    public function sort(Request $request){
        // return $request;
        $posts = CourseChapter::all();

        foreach ($posts as $post) {
            foreach ($request->order as $order) {
                        // try{
                if($order['id'] == $post->id) {
                    CourseChapter::where('id',$post->id)->update(['position' => $order['position']]);
                    
                }
            // }
            // catch(Exception){
            //     return response()->json('Update Successfully.', 200);

            // }
                
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
           CourseChapter::whereIn('id',$request->checked)->delete();

          return back()->with('error',trans('Selected CourseChapter has been deleted.'));

          
   }


   public function coursechapterstatus($id)
    {
        $coursechapter = CourseChapter::findorfail($id);

        if($coursechapter->status ==0)
        {
            DB::table('course_chapters')->where('id','=',$id)->update(['status' => "1"]); 
            return back()->with('success','Status changed to active !');
        }
        else
        {
            DB::table('course_chapters')->where('id','=',$id)->update(['status' => "0"]);
            return back()->with('delete','Status changed to deactive !');
        }
    }



    public function getTopicsByChapterId(Request $request)
    {

        $chapter_id = $request['chapterId'];
        $Topics = CourseSubject::where('chapter_id', $chapter_id)->get();

        return response()->json($Topics);
    }

}
