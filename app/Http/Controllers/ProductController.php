<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;
session_start();

class ProductController extends Controller
{
    public function index()
   {
   	return view('admin.add_product');
   }

   public function all_product()
   {
   	/*$this->AdminAuthCheck();*/

   	$all_product_info = DB::table('tb1_products')
   			->join('tb1_category','tb1_products.category_id','=','tb1_category.category_id')
   			->join('tb1_manufacture','tb1_products.manufacture_id','=','tb1_manufacture.manufacture_id')
   			->select('tb1_products.*','tb1_category.category_name','tb1_manufacture.manufacture_name')
   							->get();
    	$manage_product = view('admin.all_product')
    	->with('all_product_info', $all_product_info);
    		return view('admin_layout')
    		->with('admin.all_product', $manage_product);
   }

   public function save_product(Request $request)
   {
     $data = array();
     $data['product_name'] = $request->product_name;
     $data['category_id'] = $request->category_id;
     $data['manufacture_id'] = $request->manufacture_id;
     $data['product_short_description'] = $request->product_short_description;
     $data['product_long_description'] = $request->product_long_description;
     $data['product_price'] = $request->product_price;
     $data['product_size'] = $request->product_size;
     $data['product_color'] = $request->product_color;
     $data['publication_status'] = $request->publication_status;
     $image = $request->file('product_image');
     if ($image) {
     	$image_name = str_random(20);
     	$ext=strtolower($image->getClientOriginalExtension());
     	$image_full_name=$image_name.'.'.$ext;
     	$upload_path='image/';
     	$image_url=$upload_path.$image_full_name;
     	$success=$image->move($upload_path,$image_full_name);
     	if ($success) {
     		$data['product_image']=$image_url;

     		

     		DB::table('tb1_products')->insert($data);
     		Session::put('message', 'Product added Successfully');
     		return Redirect::to('add_product');
     	}
     }
     $data['product_image']='';
        DB::table('tb1_products')->insert($data);
        Session::put('Image added successfully');
        return Redirect::to('add_product');

   }

   public function unactive_product($product_id)
    {
    	DB::table('tb1_products')
    	->where('product_id',$product_id)
    	->update(['publication_status' => 0]);
    	Session::put('message', 'Category Unactive successfully');
    	return Redirect::to('all_product');
    }

    public function active_product($product_id)
    {
    	
    	DB::table('tb1_products')
    	->where('product_id',$product_id)
    	->update(['publication_status' => 1]);
    	Session::put('message', 'product Active successfully');
    	return Redirect::to('all_product');
    }

    public function edit_product($product_id)
    {
    	$product_info = DB::table('tb1_products')
    	->where('product_id', $product_id)
    	->first();
    	$product_info = view('admin.edit_product')
    	->with('product_info', $product_info);
    		return view('admin_layout')
    		->with('admin.edit_product', $product_info);
    }

    public function update_category(Request $request, $category_id)
    {
    	$data = array();
    	$data['category_name']=$request->category_name;
    	$data['category_description']=$request->category_description;

    	DB::table('tb1_category')
    	->where('category_id', $category_id)
    	->update($data);

    	return Redirect::to('all_category');

    }

    public function delete_product($product_id)
    {
    	DB::table('tb1_products')
    	->where('product_id', $product_id)
    	->delete();

    	return Redirect::to('all_product');
    }

    
}
