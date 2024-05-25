<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class ForgotOtpVerify extends Model
{
	  // use HasTranslations;
    
    protected $table = 'forgot_otp_verify';

    protected $fillable = ['mobile', 'otp', 'status'];
     
    public function user()
    {
        return $this->belongsTo('App\User','user_id','id')->withDefault();
    }
}
