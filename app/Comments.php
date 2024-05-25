<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
	protected $table = 'comments';
	
    protected $fillable = [ 'user_id', 'course_class_id', 'comments', 'status', 'chat_type', 'deleted'];

    public function user()
    {
        return $this->belongsTo('App\User','user_id','id')->withDefault();
    }

    public function courses()
    {
    	return $this->belongsTo('App\Course','course_id','id')->withDefault();
    }


}
