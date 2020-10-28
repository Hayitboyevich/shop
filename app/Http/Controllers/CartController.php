<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Cart;
use Session;
use Illuminate\Support\Facades\Redirect;
class CartController extends Controller
{
    public function add_to_cart(Request $request)
    {
    	$qty=$request->quantity;
    	$product_id=$request->product_id;
    	$product_info=DB::table('tb1_products')
    	->where('product_id', $product_id)
    	->first();
    	/*$quantity=$request->quantity;
    	$product_id=$request->product_id;
    	$product_info=DB::table('tb1_products')
    				->where('product_id', $product_id)
    				->first();
    	$data['quantity']=$quantity;
    	$data['id']=$product_info->$product_id;
    	$data['name']=$product_info->$product_name;
    	$data['price']=$product_info->$product_price;
    	$data['options']['image']=$product_info->$product_image;
    	Cart::add($data);

    return Redirect::to('show_cart');
*/}
    public function show_cart(Request $request)
    {
    	$product_id=$request->product_id;
    	$quantity=$request->quantity;
    	$all_published_category = DB::table('tb1_products')
    							->where('tb1_products.product_id', $product_id)
    							->where('publication_status',1)
    							->get();
    	$manage_published_category=view('pages.add_to_cart')
    					->with('all_published_category', $all_published_category);
    	return view('layout')
    				->with('pages.add_to_cart', $manage_published_category);
    }

}
