<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use App\Course;
use App\setting;
use Session;
use App\User;
use Razorpay\Api\Api;
use App\Order;

class EnrollmentController extends Controller
{

    public function enroll(Request $request,$id)
    {
        $course = Course::where('id', $id)->first();

        DB::table('orders')->insert(
            array(
                'user_id' => Auth::User()->id,
                'instructor_id' => $course->user_id,
                'course_id' => $id,
                'total_amount' => 'Free',
                'created_at'  => \Carbon\Carbon::now()->toDateTimeString(),
            )
        );

        return back()->with('success',trans('flash.EnrolledSuccessfully'));
    }

    public function buynow(Request $request)
    {
        $user_check = User::where('id', $request->user_id)->first();
        $course = Course::where('id', $request->course_id)->first();

        // $course = Course::all();
        $cart = Course::where('id', $request->course_id)->first();

        $price_total = 0;
        $offer_total = 0;
        $cpn_discount = 0;


        if ($course->discount_price != 0)
        {
            $offer_total = $offer_total + $course->discount_price;
        }
        else
        {
            $offer_total = $offer_total + $course->price;
        }



        $price_total = $price_total + $course->price;


        

        //for offer percent
        $offer_amount  = $price_total - ($offer_total);
        $value         =  $offer_amount / $price_total;
        $offer_percent = $value * 100;

        $offer_percent = $request->offer_percent;


        $cart_total = $offer_total;

        $one_course = 1;



        $data = self::createOrder($cart_total);
        //echo '<pre>'; 
        $arrRazorpayOrder = json_decode(json_encode($data), true);
        //print_r($arrRazorpayOrder);exit;
        $razorpay_order_id = $arrRazorpayOrder['order_id'];


        $lastOrder = Order::orderBy('created_at', 'desc')->first();

        if ( ! $lastOrder )
        {
            // We get here if there is no order at all
            // If there is no number set it to 0, which will be 1 at the end.
            $number = 0;
        }
        else
        { 
            $number = substr($lastOrder->order_id, 3);
        }


        $orderSave = Order::create([
                'course_id' => $request->course_id,
                'user_id' => $request->user_id,
                'order_id' => '#' . sprintf("%08d", intval($number) + 1),
                'reference_code' => $arrRazorpayOrder['reference_code'],
                'razorpay_order_id' => $razorpay_order_id,
                'razorpay_create_order_request' => json_encode($arrRazorpayOrder['arrCreateOrderRequest']),
                'razorpay_create_order_response' => json_encode($arrRazorpayOrder['arrCreateOrderResponse']),
                'total_amount' => $cart_total,
                'payment_method' => 'Razorpay',
                'payment_status' => 'P',
                'payment_source' => "WEB",
                'admin_commission' => $arrRazorpayOrder['arrPaymentDetail']['admin_commission'],
                'client_commission' => $arrRazorpayOrder['arrPaymentDetail']['client_commission'],
                'gst' => $arrRazorpayOrder['arrPaymentDetail']['gst'],
                'razorpay_charges' => $arrRazorpayOrder['arrPaymentDetail']['razorpay_charges'],
                'razorpay_split_payment_json' => json_encode($arrRazorpayOrder['arrPaymentDetail']['razorpay_split_payment_json']),
                'created_at'  => \Carbon\Carbon::now()->toDateTimeString(),
                ]
            );
        #echo "<pre>";
        #print_r($orderSave);exit;
        Session::put('one_order_course', $course->id);

        Session::put('one_order_user', $user_check->id);
        $setting = setting::first();
        if($setting->theme == '1'){
        return view('front.checkout',compact('course', 'cart', 'price_total','offer_total', 'offer_percent', 'cart_total', 'one_course', 'razorpay_order_id'));
        }
        return view('quedecato.front.checkout',compact('course', 'cart', 'price_total','offer_total', 'offer_percent', 'cart_total', 'one_course', 'razorpay_order_id'));

    }


    public function freeenroll(Request $request,$price)
    {

        $txn_id = uniqid();

        $payment_method = 'Free Enroll';

        $checkout = new OrderStoreController;

        return $checkout->orderstore($txn_id, $payment_method);

    }



    public function createOrder($amount)
    {   

        $raz_id = env('RAZORPAY_KEY');
        $raz_sec = env('RAZORPAY_SECRET');
        // Initialize Razorpay API with your API key and secret
        $api = new Api($raz_id, $raz_sec);



        $arrPaymentDetail = CalculateCommssion($amount);
        // echo '<pre>'; print_r($arrPaymentDetail);exit;

        $reference_code = substr(hash('sha256', mt_rand() . microtime()), 0, 20);
        $orderData = [
              'receipt'         => $reference_code,
              'amount'          => $amount * 100, //rupees in paise
              'currency'        => 'INR',
              'payment_capture' => 1, // auto capture
              "transfers" => $arrPaymentDetail['razorpay_split_payment_json']['transfers'],
            ];

        try {
            $arrRazorpayOrder = array();
            $arrRazorpayOrder = $api->order->create($orderData)->toArray();
            //echo '<pre>'; print_r($arrRazorpayOrder);exit;
            // Extract order_id from the response
            $orderId = $arrRazorpayOrder['id'];
            $arrRazorpayOrder = json_decode(json_encode($arrRazorpayOrder), true);
            //echo '<pre>'; print_r($arrRazorpayOrder);exit;
            // Pass order_id to the frontend
            $arrReturn['order_id'] = $orderId;
            $arrReturn['reference_code'] = $reference_code;
            $arrReturn['arrCreateOrderRequest'] = $orderData;
            $arrReturn['arrCreateOrderResponse'] = $arrRazorpayOrder;
            $arrReturn['arrPaymentDetail'] = $arrPaymentDetail;
            return $arrReturn;
        } catch (\Exception $e) {
            // Handle exceptions
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
   