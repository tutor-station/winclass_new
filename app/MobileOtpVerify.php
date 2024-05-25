<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class MobileOtpVerify extends Model
{
	  // use HasTranslations;
    
	  protected $table = 'mobile_otp_verify';

    protected $fillable = ['mobile', 'otp'];
     
    public function user()
    {
        return $this->belongsTo('App\User','user_id','id')->withDefault();
    }
}
