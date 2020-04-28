<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests;
use Cart;
use Illuminate\Support\Facades\Redirect;
use Softon\Indipay\Facades\Indipay;
Session_start();

class CheckoutController extends Controller
{
    public function checkout(Request $Request)
    {
    	
        return view('pages.checkout');
    }

    public function login_check(Request $request)
    {
    	return view('pages.login');

    }
    public function user_register(Request $request)
    {
    	$data = array();
    	$data['customer_name'] = $request->user_name;
    	$data['customer_email'] = $request->user_email;
    	$data['password'] = md5($request->user_pass);
    	$data['phone'] = $request->user_phone;

    	$customer_id = DB::table('tbl_customer')->insertGetId($data);

    	Session::put('customer_id',$customer_id);
    	Session::put('customer_name',$request->user_name);
    	return Redirect::to('/checkout');

    }

    public function shipping_details(Request $request)
    {
    	//return $request->input();die;
    	$data = array();
    	$data['shipping_email'] = $request->email;
    	$data['shipping_first_name'] = $request->first_name;
    	$data['shipping_last_name'] = $request->last_name;
		$data['shipping_address'] = $request->address;
    	$data['shipping_phone'] = $request->phone;
    	$data['shipping_city'] = $request->city;
		$data['shipping_zipcode'] = $request->zip_code;

		$shipping_id = DB::table('tbl_shipping')->insertGetId($data);
		Session::put('shipping_id',$shipping_id);
		return Redirect::to('payment');
		

    }

	    public function customer_login(Request $request)
	    {

	    	$email = $request->user_email;
	    	$pass = md5($request->user_pass);
	    	//echo $pass;die;
	    	$result = DB::table('tbl_customer')->where('customer_email',$email)->where('password',$pass)->first();
	    	
	    	if($result){
	    		Session::put('customer_id',$result->customer_id);
	    		return Redirect::to('/checkout');

	    	}else{
	    		return Redirect::to('login_check')->with('message','Invalid Email Or Password');

	    	}
	    }

//logout
    	public function customer_logout(Request $request)
    	{
    		Session::flush();
    		return Redirect::to('/');
    	}

    	public function payment(Request $request)
    	{
    		return view('pages.payment');
    	}

    	//order place
    	public function order_place(Request $request)
    	{
            
    		$payment_gateway = $request->payment_gateway;
    		$pdata = array();
    		$pdata['payment_method'] = $request->payment_gateway;
    		$pdata['payment_status'] = 'pending';
    		$payment_id = DB::table('tbl_payment')->insertGetId($pdata);

    		$data = array();
    		$data['customer_id'] = Session::get('customer_id');
    		$data['shipping_id'] = Session::get('shipping_id');
    		$data['payment_id'] = $payment_id;
    		$data['order_total'] = Cart::total();
    		$data['order_status'] = 'pending';

    		$order_id = DB::table('tbl_order')->insertGetId($data);

    		$contents = Cart::content();
    		$oddata = array();
            $order_number = 'BRIJ'.strtoupper(uniqid()).rand(10,99);
          //  echo $order_number;die;
    		foreach ($contents as $key => $content) {
    			$oddata['order_id'] = $order_id;
    			$oddata['product_id'] = $content->id;
    			$oddata['product_name'] = $content->name;
    			$oddata['product_price'] = $content->price;
    			$oddata['product_sales_quantity'] = $content->qty;	
    			$oddata['order_number'] = $order_number;
               // echo 1;die;

    			$order = DB::table('tbl_order_detail')->insert($oddata);
    			}

    			if ($payment_gateway=='cod') {
    				return view('pages.cod',compact('order_number'));
    				Cart::destroy();
    			}elseif ($payment_gateway=='paypal') {
    				echo'Successfully Using Paypal Your Order Number is'.$order_number;
    			}elseif ($payment_gateway=='pumoney') {
                    return Redirect::to('/payumoney');
    				
    			}elseif($payment_gateway==''){
    				echo 'Not selected';
    			}
    	}

        public function payumoney(Request $request)
        {
            //echo 1;die;
             $parameters = [
                    'txnd' => 10000001,
                    'order_id' => 10000001,
                    'amount' => 1200,
                    'firstname' => 'Brijbhan',
                    'lastname' => 'Tiwari',
                    'phone' =>8573992385,
                    'productinfo'=>676666,
                    'email' => 'tiwari018@gmail.com',
                    'city' =>'Noida',
                    'zipcode'=>1233445,
                    'state' =>'UP',
                    'country' =>'india',
                    'address1' => 'Nirala Estate',
                    'address2'=>'Nirala',
                    'curl' => url('pay/response'),

                  ];
                    $order = Indipay::prepare($parameters);
                    return Indipay::process($order);
        }
    
}
