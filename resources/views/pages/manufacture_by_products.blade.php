@extends('layout')
@section('content')

<h2 class="title text-center">Features Items</h2>
         <?php foreach($product_by_manufacture as $v_category_by_manufacture) {?>
                        <div class="col-sm-4">
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                        <div class="productinfo text-center">
                                          <img src="{{URL::to($v_category_by_manufacture->product_image)}}" style="height:300px;" alt="" />
                                            <h2>${{$v_category_by_manufacture->product_price}}</h2>
                                            <p>{{$v_category_by_manufacture->product_name}}</p>
                                            <a href="{{URL::to('view_product/'.$v_category_by_manufacture->product_id)}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                        </div>
                                        <div class="product-overlay">
                                            <div class="overlay-content">
                                                <h2>${{$v_category_by_manufacture->product_price}}</h2>
                                                <p>{{$v_category_by_manufacture->product_name}}</p>
                                                <a href="{{URL::to('view_product/'.$v_category_by_manufacture->product_id)}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                            </div>
                                        </div>
                                </div>
                                  <div class="choose">
                                    <ul class="nav nav-pills nav-justified">
                                        <li><a href="#"><i class="fa fa-plus-square"></i>{{$v_category_by_manufacture->product_name}}</a></li>
                                        <li><a href="{{URL::to('view_product/'.$v_category_by_manufacture->product_id)}}"><i class="fa fa-plus-square"></i>View Product</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                       
                      <?php } ?>  
                    </div><!--features_items-->
                    
                     
                 

@endsection
