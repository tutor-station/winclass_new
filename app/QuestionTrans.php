<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QuestionTrans extends Model
{
	protected $table = 'questions_trans';
	
    protected $fillable = ['topic_id', 'question_id', 'status', 'deleted'];
	
    public function quizquestion()
    {
        return $this->hasMany('App\Quiz','id');
    }

	public function questionTrans()
    {
        return $this->hasMany('App\QuestionTrans','question_id');
    }

}
