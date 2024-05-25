<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class LiveClasses extends Model
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

    protected $table = 'live_classes';  

    protected $fillable = [
        'title', 'course_id', 'video_type', 'thumbnail', 'live_stream', 'date_time', 'url', 'pro_class', 'desc', 'pdf_with_annotation', 'pdf_without_annotation', 'order_no', 'status'
    ]; 

    public function courses()
    {   
        return $this->hasMany('App\Course','course_id', 'id');
    } 
}
