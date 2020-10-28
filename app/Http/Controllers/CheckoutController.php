<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Session;
use DB;
use Illuminate\Support\Facades\Redirect; 

class CheckoutController extends Controller
{
	public function login_check()
	{
		return view('pages.login');
	}

	public function customer_registration(Request $request)
	{
		$data =array();
		$data['customer_name'] = $request->customer_name;
		$data['customer_email'] = $request->customer_email;
		$data['password'] = md5($request->password);
		$data['mobile_number'] = $request->mobile_number;

		$customer_id = DB::table('tb1_customer')
							->insertGetId($data);

		Session::put('customer_id', $customer_id);
		Session::put('customer_name', $request->customer_name);

		return redirect('checkout');
	}

	public function checkout()
	{
		return view('pages.checkout');
	}

	public function save_shipping(Request $request)
	{
		$data = array();
		$data['shipping_email'] = $request->shipping_email;
		$data['shipping_first_name'] = $request->shipping_first_name;
		$data['shipping_last_name'] = $request->shipping_last_name;
		$data['shipping_address'] = $request->shipping_address;
		$data['shipping_mobile_number'] = $request->shipping_mobile_number;
		$data['shipping_city'] = $request->shipping_city;
		 
		 $shipping_id = DB::table('tb1_shipping')
		 				->insertGetId($data);
		 Session::put('shipping_id', $shipping_id);
		 return Redirect::to('payment');
	}

		public function customer_login(Request $request)
		{
			$customer_email = $request->customer_email;
			$password = md5($request->password);
			$result = DB::table('tb1_customer')
							->where('customer_email', $customer_email)
							->where('password', $password)
							->first();
			if ($result) {
				Session::put('customer_id', $result->customer_id);
				return Redirect::to('checkout');
			}
			else{
				return Redirect::to('login_check');
			}
		}


		public function payment(Request $request)
		{
		$product_id=$request->product_id;
    	$quantity=$request->quantity;
    	$all_published_category = DB::table('tb1_products')
    							->where('tb1_products.product_id', $product_id)
    							->where('publication_status',1)
    							->get();
    	$manage_published_category=view('pages.payment')
    					->with('all_published_category', $all_published_category);
    	return view('layout')
    				->with('pages.payment', $manage_published_category);
    
		}

		public function customer_logout()
		{
			Session::flush();
    	return Redirect::to('/')->send();
		}


}
