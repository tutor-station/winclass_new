<?php

namespace App\Http\Controllers;

use App\Quiz;
use Illuminate\Http\Request;
use App\Course;
use App\QuizTopic;
use App\QuizAnswer;
use File;
use Image;
use Illuminate\Support\Facades\DB as FacadesDB;
use Illuminate\Support\Facades\Validator;
use Rap2hpoutre\FastExcel\FastExcel;
use Session;
use DB;
use Spatie\Permission\Models\Role;
use Yajra\DataTables\Facades\DataTables;
use App\QuestionTrans;


class QuizController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cor = Course::all();
        $topics = QuizTopic::all();
        $questions = Quiz::all();
        return view('admin.course.quiz.index', compact('questions', 'topics', 'cor'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        

        if(isset($request->type)){

          $request->validate([
            'course_id' => 'required',
            'topic_id' => 'required',
            'question' => 'required',
            'type' => 'required',
          ]);
          

        }else{
          

          if($request->data_type=='Objective'){
            $request->validate([
              'course_id' => 'required',
              'topic_id' => 'required',
              'question' => 'required',
              'a' => 'required',
              'b' => 'required',
              'c' => 'required',
              'd' => 'required',
              'answer' => 'required',
            ]);
          } else {
            $request->validate([
              'course_id' => 'required',
              'topic_id' => 'required',
              'question' => 'required',
              'first_option_ans' => 'required',
              'second_option_ans' => 'required',
              'answer' => 'required',
            ]);
          }

        }



        $input = $request->all();

        if(isset($request->type)){
          $input['type'] = '1';
        }else{
          $input['type'] = null;
        }

        if($file = $request->file('question_img')) 
        { 
          
          $path = 'images/quiz/';

          if(!file_exists(public_path().'/'.$path)) {
            
            $path = 'images/quiz/';
            File::makeDirectory(public_path().'/'.$path,0777,true);
          }    
          $optimizeImage = Image::make($file);
          $optimizePath = public_path().'/images/quiz/';
          $image = time().$file->getClientOriginalName();
          $optimizeImage->save($optimizePath.$image, 72);

          $input['question_img'] = $image;
          
        }

        
        $input['answer_exp'] = $request->answer_exp;
        Quiz::create($input);
        return back()->with('success', trans('flash.AddedSuccessfully'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Quiz  $quiz
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $topic = QuizTopic::findOrFail($id);
        $quizes = Quiz::where('topic_id', $topic->id)->orderBy('position')->get();
        return view('admin.course.quiz.index', compact('topic', 'quizes'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Quiz  $quiz
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $topic = QuizTopic::findOrFail($id);
        $editquizes = Quiz::where('$id', $topic->id)->get();
        return view('admin.course.quiz.index', compact('topic', 'editquizes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Quiz  $quiz
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $question = Quiz::findOrFail($id);
        //return $request;
        if($request->data_type=='Objective'){
          $request->validate([
            'course_id' => 'required',
            'topic_id' => 'required',
            'question' => 'required',
            'a' => 'required',
            'b' => 'required',
            'c' => 'required',
            'd' => 'required',
            'answer' => 'required',
          ]);
        } else {
          $request->validate([
            'course_id' => 'required',
            'topic_id' => 'required',
            'question' => 'required',
            'first_option_ans' => 'required',
            'second_option_ans' => 'required',
            'answer' => 'required',
          ]);
        }
        $input = $request->all();
        if($file = $request->file('question_img'))
        {
          $path = 'images/quiz/';
          if(!file_exists(public_path().'/'.$path)) {
            $path = 'images/quiz/';
            File::makeDirectory(public_path().'/'.$path,0777,true);
          }
          $optimizeImage = Image::make($file);
          $optimizePath = public_path().'/images/quiz/';
          $image = time().$file->getClientOriginalName();
          $optimizeImage->save($optimizePath.$image, 72);
          $input['question_img'] = $image;
        }
        $input['answer_exp'] = $request->answer_exp;
        $question->update($input);
        return back()->with('success', trans('flash.UpdatedSuccessfully'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Quiz  $quiz
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $question = Quiz::findOrFail($id);
        $question->delete();

        QuizAnswer::where('question_id', $id)->delete();

        return back()->with('delete', trans('flash.DeletedSuccessfully'));
    }


    public function importquiz()
    {
        return view('admin.course.quiz.importindex');
    }


    // public function imports(Request $request)
    // {
    //     $validator = Validator::make(
    //         [
    //             'file' => $request->file,
    //             'extension' => strtolower($request->file->getClientOriginalExtension()),
    //         ],
    //         [
    //             'file' => 'required',
    //             'extension' => 'required|in:xlsx,xls,csv',
    //         ]

    //     );


    //     if ($validator->fails()) {
    //         return back()->withErrors('Invalid file type!');
    //     }

    //     if (!$request->has('file')) {
           
    //         return back()->withErrors('Please choose a file !');
    //     }

    //     $fileName = time() . '.' . $request->file->getClientOriginalExtension();

    //     if (!is_dir(public_path() . '/excel')) {
    //         mkdir(public_path() . '/excel');
    //     }

    //     $request->file->move(public_path('excel'), $fileName);
        
    //     $lang = Session::get('changed_language');

        

    //     $quiz_import = (new FastExcel)->import(public_path() . '/excel/' . $fileName);
        

    //     if (count($quiz_import) > 0) 
    //     {

    //       try
    //       {
            

    //         foreach ($quiz_import as $key => $row_fetch) {
                
    //           $line_number = $key + 1;

    //             $course_title = $row_fetch['Course'];

    //             $course_id = Course::whereRaw("JSON_EXTRACT(title, '$.$lang') = '$course_title'")->first();

    //             $quiz_topic = $row_fetch['QuizTopic'];

    //             $topic_id = QuizTopic::whereRaw("JSON_EXTRACT(title, '$.$lang') = '$quiz_topic'")->first();

    //             $quiz_question = $row_fetch['Question'];

    //             $option_A = $row_fetch['A'];

    //             $option_B = $row_fetch['B'];

    //             $option_C = $row_fetch['C'];

    //             $option_D = $row_fetch['D'];


    //             $correct_answer = $row_fetch['CorrectAnswer'];

               

    //             $product = Quiz::create([

    //                 'course_id' => $course_id->id,
    //                 'topic_id' => $topic_id->id,
    //                 'question' => $quiz_question,
    //                 'a' => $option_A,
    //                 'b' => $option_B,
    //                 'c' => $option_C,
    //                 'd' => $option_D,
    //                 'answer' => $correct_answer,

    //             ]);
                
                

    //         }

    //       }
    //       catch (\Swift_TransportException $e)
    //       {
            
    //           $file = @file_get_contents(public_path() . '/excel/' . $fileName);

    //           if ($file) {
    //             unlink(public_path() . '/excel/' . $fileName);
    //           }

    //           \Session::flash('delete', $e->getMessage());
    //           return back();
    //       }

    //     }
    //     else {
            
    //         $file = @file_get_contents(public_path() . '/excel/' . $fileName);

    //         if ($file) {
    //             unlink(public_path() . '/excel/' . $fileName);
    //         }
             
    //         return back()->with('success', trans('flash.AddedSuccessfully'));
    //     }


    //     return back()->with('success', trans('flash.AddedSuccessfully'));
    // }



    public function import(Request $req){
    
    // header('Content-Type: text/html; charset=utf-8');

    $lang = Session::get('changed_language');
    $csvFile = fopen($_FILES['file']['tmp_name'], 'r', 'UTF-8');
    fgetcsv($csvFile); 
         $file_data= array();
        $data = array();
            while(($line = fgetcsv($csvFile)) !== FALSE){
                // print_r("callll");exit;
                $product = Quiz::create([

                    'course_id' => ($line[0] != "") ? $line[0] : "",
                    'topic_id' => ($line[1] != "") ? $line[1] : "",
                    'question' => ($line[2] != "") ? $line[2] : "",
                    'a' => ($line[3] != "") ? $line[3] : "",
                    'b' => ($line[4] != "") ? $line[4] : "",
                    'c' => ($line[5] != "") ? $line[5] : "",
                    'd' => ($line[6] != "") ? $line[6] : "",
                    'answer' => ($line[7] != "") ? $line[7] : "",

                ]);

            
           }
           // exit;
            fclose($csvFile);
            Session::flash('success', trans('Import Successfully'));
            return redirect('admin/import/quiz');
        }


    public function quizreview()
    {

      $answers = QuizAnswer::where('type', '1')->get();
      return view('admin.course.quiz.review.index', compact('answers'));

    }


    public function quizreviewQuick(Request $request)
    {
        
        $user =  QuizAnswer::find($request->id);

        $user->txt_approved = $request->status;

        $user->save();
        return response()->json($request->all());
    
       
      
    }

   public function status(Request $request)
    {
        $user = QuizAnswer::find($request->id);
        $user->status = $request->status;
        $user->save();
        return back()->with('success',trans('flash.UpdatedSuccessfully'));
        
        
    }
    public function reposition(Request $request)
    {

        $data= $request->all();
     
        $posts = Quiz::all();
       
        $pos = $data['id'];
        
        $position =json_encode($data);
     
        foreach ($posts as $key => $item) {
        
          Quiz::where('id', $item->id)->update(array('position' => $pos[$key]));
        }

        return response()->json(['msg'=>'Updated Successfully', 'success'=>true]);


    }



    public function showAllQuestions(Request $request)
    {   

        $data = Quiz::all();
        if ($request->ajax()) {

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('checkbox', function ($row) {

                    $chk = "<div class='inline'>
                              <input type='checkbox' form='bulk_delete_form' class='filled-in material-checkbox-input' name='' value='$row->id' id='checkbox$row->id'>
                              <label for='checkbox$row->id' class='material-checkbox'></label>
                            </div>";

                    return $chk;
                })
                ->addColumn('id', function ($row) {
                    
                    return $row->id ?? '-';

                })
                ->addColumn('question', function ($row) {
                    
                    return $row->question ?? '-';

                })
                ->addColumn('a', function ($row) {
                
                    return $row->a ?? '-';

                })
                ->addColumn('b', function ($row) {
                
                    return $row->b ?? '-';

                })
                ->addColumn('c', function ($row) {
                
                    return $row->c ?? '-';

                })
                ->addColumn('d', function ($row) {
                
                    return $row->d ?? '-';

                })
                ->addColumn('answer', function ($row) {
                
                    return $row->answer ?? '-';

                })
                ->addColumn('action', function ($row) {


                    $chk = "<div class='dropdown'>
                        <button class='btn btn-round btn-outline-primary' type='button' id='CustomdropdownMenuButton1' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'><i class='feather icon-more-vertical-'></i></button>
                        <div class='dropdown-menu' aria-labelledby='CustomdropdownMenuButton1'>";
                            
                            if($row->type == NULL){

                            $chk .= "<a class='dropdown-item' href='" . url('questionEdit/'.$row->id) . "'><i class='feather icon-edit mr-2'></i>Edit</a>";

                            }else
                            if($row->type == '1'){

                            $chk .= "<a class='dropdown-item' data-toggle='modal' data-target='#myModaleditsub".$row->id."' href='#'><i class='feather icon-edit mr-2'></i>Edit</a>";
                            }

                            $chk .= "<a class='dropdown-item btn btn-link' data-toggle='modal' data-target='#delete".$row->id."' >
                                <i class='feather icon-delete mr-2'></i>Delete</a>
                                </a>
                            </div>
                        </div>";

                    return $chk;
                })

                ->rawColumns(['checkbox', 'question', 'a', 'b', 'c', 'd', 'answer', 'action'])
                ->make(true);
        }

        return view('admin.course.quiz.allquestions');
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function questionStore(Request $request)
    {

        if(isset($request->type)){

          $request->validate([
            'question' => 'required',
            'type' => 'required',
          ]);
          

        }else{
          
          if($request->data_type=='Objective'){
            $request->validate([
              'question' => 'required',
              'a' => 'required',
              'b' => 'required',
              'c' => 'required',
              'd' => 'required',
              'answer' => 'required',
            ]);
          } else {
            $request->validate([
              'question' => 'required',
              'first_option_ans' => 'required',
              'second_option_ans' => 'required',
              'answer' => 'required',
            ]);
          }

        }



        $input = $request->all();

        if(isset($request->type)){
          $input['type'] = '1';
        }else{
          $input['type'] = null;
        }

        if($file = $request->file('question_img')) 
        { 
          
          $path = 'images/quiz/';

          if(!file_exists(public_path().'/'.$path)) {
            
            $path = 'images/quiz/';
            File::makeDirectory(public_path().'/'.$path,0777,true);
          }    
          $optimizeImage = Image::make($file);
          $optimizePath = public_path().'/images/quiz/';
          $image = time().$file->getClientOriginalName();
          $optimizeImage->save($optimizePath.$image, 72);

          $input['question_img'] = $image;
          
        }

        
        $input['answer_exp'] = $request->answer_exp;
        Quiz::create($input);
        return back()->with('success', trans('flash.AddedSuccessfully'));
    }

    public function EditQuestion($id)
    {
        $editquizes = Quiz::where('id', $id)->first();
        // echo '<pre>'; print_r($editquizes);exit;
        return view('admin.course.quiz.editQuestion', compact('editquizes', 'id'));
    }



    public function assignQuestionShow(Request $request, $id)
    {

        $already_data = QuestionTrans::where("topic_id", $id)->get()->toArray();
        // echo '<pre>'; print_r($already_data);exit;
        if(!empty($already_data)){
           $data = DB::table('quiz_questions')
            ->leftJoin('questions_trans', function($join) use ($id) {
                $join->on('quiz_questions.id', '=', 'questions_trans.question_id')
                     ->where('questions_trans.topic_id', '=', $id);
            })
            ->orderBy('quiz_questions.id', 'desc') 
            ->select('quiz_questions.*', 'questions_trans.id as question_trans_id')
            ->get();
        }else{
            $data = Quiz::orderBy('id', 'desc')->get();
        }
        
        $count_array = count($data);
        
        if ($request->ajax()) {

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('checkbox', function ($row) {

                    $checked = '';
                    if($row->question_trans_id != ""){
                        $checked = 'checked';
                    }

                    $chk = "<div class='inline'>
                              <input type='checkbox' class='filled-in material-checkbox-input' name='questionIds[]' value='$row->id' id='checkbox$row->id' ". $checked .">
                              <label for='checkbox$row->id' class='material-checkbox'></label>
                            </div>";

                    return $chk;
                })
                ->addColumn('id', function ($row) {
                    
                    return $row->id ?? '-';

                })
                ->addColumn('question', function ($row) {
                    
                    return $row->question ?? '-';

                })
                ->addColumn('a', function ($row) {
                
                    return $row->a ?? '-';

                })
                ->addColumn('b', function ($row) {
                
                    return $row->b ?? '-';

                })
                ->addColumn('c', function ($row) {
                
                    return $row->c ?? '-';

                })
                ->addColumn('d', function ($row) {
                
                    return $row->d ?? '-';

                })
                ->addColumn('answer', function ($row) {
                
                    return $row->answer ?? '-';

                })

                ->rawColumns(['checkbox', 'question', 'a', 'b', 'c', 'd', 'answer'])
                ->make(true);
        }

        return view('admin.course.quiz.assignAllquestions', compact('id', 'count_array'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function assignQuestionsStore(Request $request)
    {
        
        

        $request->validate([
            'topic_id' => 'required',
        ]);

        $topic_id = $request->topic_id;
        $questionIds = $request->questionIds;

        $deleted = QuestionTrans::where('topic_id', $topic_id)->delete();

        foreach($questionIds as $key => $val)
        {
            $input['topic_id'] = $topic_id;
            $input['question_id'] = $val;
            $input['status'] = 1;
            $input['created_at'] = \Carbon\Carbon::now()->toDateTimeString();
            $input['updated_at'] = \Carbon\Carbon::now()->toDateTimeString();

            QuestionTrans::create($input);
        }

        return response()->json(['success' => true, 'message' => trans('flash.AddedSuccessfully')]);


    }



    public function QuestionUpdate(Request $request)
    {
        $question = Quiz::findOrFail($request->question_id);
        
        $input = $request->all();
        
        if($file = $request->file('question_img'))
        {
          $path = 'images/quiz/';
          if(!file_exists(public_path().'/'.$path)) {
            $path = 'images/quiz/';
            File::makeDirectory(public_path().'/'.$path,0777,true);
          }
          $optimizeImage = Image::make($file);
          $optimizePath = public_path().'/images/quiz/';
          $image = time().$file->getClientOriginalName();
          $optimizeImage->save($optimizePath.$image, 72);
          $input['question_img'] = $image;
        }

        $input['answer_exp'] = $request->answer_exp;
        $question->update($input);
        return back()->with('success', trans('flash.UpdatedSuccessfully'));
    }



    public function viewAssignedQuestion(Request $request, $id)
    {

        $data = DB::table('questions_trans')
            ->join('quiz_questions', 'quiz_questions.id', '=', 'questions_trans.question_id')
            ->select('quiz_questions.*', 'questions_trans.id as question_trans_id')
            ->where('questions_trans.topic_id', $id)
            ->get();
                                     
        // echo '<pre>'; print_r($data);exit;
        if ($request->ajax()) {

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('checkbox', function ($row) {

                    $chk = "<div class='inline'>
                              <input type='checkbox' class='filled-in material-checkbox-input' name='questionIds' value='$row->id' id='checkbox$row->id'>
                              <label for='checkbox$row->id' class='material-checkbox'></label>
                            </div>";

                    return $chk;
                })
                ->addColumn('id', function ($row) {
                    return $row->question_trans_id ?? '-';

                })
                ->addColumn('question', function ($row) {
                    
                    return $row->question ?? '-';

                })
                ->addColumn('a', function ($row) {
                
                    return $row->a ?? '-';

                })
                ->addColumn('b', function ($row) {
                
                    return $row->b ?? '-';

                })
                ->addColumn('c', function ($row) {
                
                    return $row->c ?? '-';

                })
                ->addColumn('d', function ($row) {
                
                    return $row->d ?? '-';

                })
                ->addColumn('answer', function ($row) {
                
                    return $row->answer ?? '-';

                })
                ->addColumn('action', function ($row) {


                    $chk = "<div class='dropdown'>
                                <button class='btn btn-round btn-outline-primary' type='button' id='CustomdropdownMenuButton1' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'><i class='feather icon-more-vertical-'></i></button>
                                <div class='dropdown-menu' aria-labelledby='CustomdropdownMenuButton1'>
                                <a class='dropdown-item' href='" . url('questionEdit/'.$row->id) . "'>
                                <i class='feather icon-edit mr-2'></i>Edit</a>
                                </div>
                            </div>";

                    return $chk;
                })

                ->rawColumns(['checkbox', 'question', 'a', 'b', 'c', 'd', 'answer', 'action'])
                ->make(true);
        }

        return view('admin.course.quiz.viewaAssignedQuestions', compact('id'));
    }
}
