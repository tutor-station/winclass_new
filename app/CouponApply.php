<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CouponApply extends Model
{
	protected $table = 'coupon_apply';
	
    protected $fillable = [ 'course_id', 'user_id', 'coupon_id', 'status'];

    

    public function user()
    {
        return $this->belongsTo('App\User','user_id','id')->withDefault();
    }

    public function courses()
    {
    	return $this->belongsTo('App\Course','course_id','id')->withDefault();
    }

    public function coupon()
    {
        return $this->belongsTo('App\Coupon','coupon_id','id')->withDefault();
    }	

}
