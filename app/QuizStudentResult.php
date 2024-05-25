<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QuizStudentResult extends Model
{
	protected $table = 'quiz_student_result';

    protected $fillable = ['course_id', 'topic_id', 'user_id', 'total_questions', 'total_unanswered', 'total_answered', 'total_correct_answer',  'total_incorrect_answer', 'total_marks', 'obtain_marks', 'total_nagetive_marks', 'percantage', 'taken_time', 'attempt_count'];

    
    public function topic()
    {
        return $this->belongsTo('App\QuizTopic','topic_id','id')->withDefault();
    }

    public function courses()
    {
        return $this->belongsTo('App\Course','course_id','id')->withDefault();
    } 
    
    public function user()
    {
        return $this->belongsTo('App\User','user_id','id')->withDefault();
    } 
}
