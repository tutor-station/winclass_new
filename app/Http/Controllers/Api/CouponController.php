<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Coupon;
use Carbon;
use App\Cart;
use Auth;
use Session;
use DB;
use Validator;
use App\CouponApply;

class CouponController extends Controller
{
    public function applycoupon(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'secret' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['Secret Key is required']);
        }

        $key = DB::table('api_keys')->where('secret_key', '=', $request->secret)->first();

        if (!$key) {
            return response()->json(['Invalid Secret Key !']);
        }

        $auth = Auth::user();

        $already_apply = CouponApply::where('user_id', '=', $auth->id)->where('course_id', $request->course_id)->where('status', 1)->first();
        if ($already_apply) {
            return response()->json(['Coupon Already Applied.']);
        }

        $coupon = Coupon::where('code', $request->coupon)->where('course_id', $request->course_id)->first();
        $mytime = Carbon\Carbon::now();
        $date = $mytime->toDateTimeString();

        if(isset($coupon)){

            if($coupon->expirydate >= $date)
            {
                if($coupon->maxusage != 0)
                {
                    if($coupon->link_by == 'course')
                    {

                        $couponApply = CouponApply::create([
                            'course_id' => $request->course_id,
                            'user_id' => $auth->id,
                            'coupon_id' => $coupon->id,
                            'status' => 0
                        ]);

                        if($couponApply){
                            if ($coupon->distype == 'per')
                            {
                                $per = $cart->offer_price * $coupon->amount / 100;
                            }
                            else
                            {
                                $per = $coupon->amount;
                            }

                            // DB::table('coupons')->where('code', '=', $coupon['code'])->decrement('maxusage', 1);

                            return response()->json(['coupon_apply_id' => $couponApply->id, 'discount_amount' => $per, 'msg' => 'Coupon Applied Successfully !'], 200);
                        }
                    }
                }
                else
                {
                    return response()->json('Coupon max limit reached !', 401);
                }

            }
            else
            {
                return response()->json('Coupon Expired !', 401);
            }

        }else{

            return response()->json('Invalid Coupon !', 401);
        }

    }


    public function remove(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'secret' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['Secret Key is required']);
        }

        $key = DB::table('api_keys')->where('secret_key', '=', $request->secret)->first();

        if (!$key) {
            return response()->json(['Invalid Secret Key !']);
        }

        $user = Auth::user();
        
        Cart::where('user_id', '=', $user->id)
            ->update(['distype' => NULL, 'disamount' => NULL]);
        

        return response()->json('Coupon Removed !', 200);
       
    }
}
