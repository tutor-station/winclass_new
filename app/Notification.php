<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Notification extends Model
{
	use HasTranslations;
    
    public $translatable = ['notification_id', 'message', 'title', 'description', 'user_type', 'course_id', 'batch_id', 'district_id', 'image_file', 'image_thumbs', 'noti_date', 'schedule_cancelled', 'recipients', 'status', 'institute_id'];


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


	  protected $table = 'notification';


    protected $fillable = ['notification_id', 'message', 'title', 'description', 'user_type', 'course_id', 'batch_id', 'district_id', 'image_file', 'image_thumbs', 'noti_date', 'is_scheduled', 'schedule_time', 'one_signal_notification_id', 'schedule_cancelled', 'recipients', 'status', 'institute_id'];
     

    public function Course()
    {
        return $this->belongsTo('App\Course','course_id','id')->withDefault();
    }

}
