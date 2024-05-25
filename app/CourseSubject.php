<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class CourseSubject extends Model
{
	use HasTranslations;
    
    public $translatable = ['title'];

    /**
     * Convert the model instance to an array.
     *
     * @return array
     */
    public function toArray()
    {
      $attributes = parent::toArray();
      
      foreach ($this->getTranslatableAttributes() as $name) {
          $attributes[$name] = $this->getTranslation($name, app()->getLocale());
      }
      
      return $attributes;
    }

    protected $table = 'course_subject';

    protected $fillable = [ 'course_id', 'chapter_id', 'title', 'deleted' ];

    public function courseclass()
    {
        return $this->hasMany('App\CourseSubject','subject_id');
    }

    public function courses()
    {
    	return $this->belongsTo('App\Course','course_id','id')->withDefault();
    }

    public function courseChapter()
    {
        return $this->hasMany('App\CourseChapter','id');
    }

}
