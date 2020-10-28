<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;

class HomeController extends Controller
{
    public function index()
    {
    	$all_published_product = DB::table('tb1_products')
   			->join('tb1_category','tb1_products.category_id','=','tb1_category.category_id')
   			->join('tb1_manufacture','tb1_products.manufacture_id','=','tb1_manufacture.manufacture_id')
   			->select('tb1_products.*','tb1_category.category_name','tb1_manufacture.manufacture_name')
   			->where('tb1_products.publication_status',1)
   			->limit(9)
   							->get();
    	$manage_published_product = view('pages.home_content')
    	->with('all_published_product', $all_published_product);
    		return view('layout')
    		->with('pages.home_content', $manage_published_product);
    }

    
  public function product_details_by_id($product_id)
  {
    $product_by_details = DB::table('tb1_products')
            ->join('tb1_category','tb1_products.category_id','=','tb1_category.category_id')
            ->join('tb1_manufacture','tb1_products.manufacture_id','=','tb1_manufacture.manufacture_id')
            ->select('tb1_products.*','tb1_category.category_name','tb1_manufacture.manufacture_name')
            ->where('tb1_products.product_id', $product_id)
            ->where('tb1_products.publication_status',1)
            ->limit(18)
            ->first();
        $manage_product_by_details = view('pages.product_details')
        ->with('product_by_details', $product_by_details);
            return view('layout')
            ->with('pages.product_details', $manage_product_by_details);
  }

  public function show_product_by_category($category_id)
  {
 	 $product_by_category = DB::table('tb1_products')
            ->join('tb1_category','tb1_products.category_id','=','tb1_category.category_id')
            ->select('tb1_products.*','tb1_category.category_name')
            ->where('tb1_category.category_id', $category_id)
            ->where('tb1_products.publication_status',1)
            ->limit(18)
            ->get();
        $manage_by_category = view('pages.category_by_products')
        ->with('product_by_category', $product_by_category);
            return view('layout')
            ->with('pages.category_by_products', $manage_by_category);
}

 public function show_product_by_manufacture($manufacture_id)
  {
    $product_by_manufacture = DB::table('tb1_products')
            ->join('tb1_category','tb1_products.category_id','=','tb1_category.category_id')
            ->join('tb1_manufacture','tb1_products.manufacture_id','=','tb1_manufacture.manufacture_id')
            ->select('tb1_products.*','tb1_category.category_name','tb1_manufacture.manufacture_name')
            ->where('tb1_manufacture.manufacture_id', $manufacture_id)
            ->where('tb1_products.publication_status',1)
            ->limit(18)
            ->get();
        $manage_product_by_manufacture = view('pages.manufacture_by_products')
        ->with('product_by_manufacture', $product_by_manufacture);
            return view('layout')
            ->with('pages.manufacture_by_products', $manage_product_by_manufacture);
  }

 
}
