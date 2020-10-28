@extends('layout')
@section('content')

<div class="product-details"><!--product-details-->
						<div class="col-sm-5">
							<div class="view-product">
								<img src="{{URL::to($product_by_details->product_image)}}" alt="" />
								<h3>ZOOM</h3>
							</div>
						</div>
						<div class="col-sm-7">
							<div class="product-information"><!--/product-information-->
								<img src="{{URL::to('frontend/images/product-details/new.jpg')}}" class="newarrival" alt="" />
								<h2>{{$product_by_details->product_name}}</h2>
								<p>Color: {{$product_by_details->product_color}}</p>
								<img src="{{URL::to('frontend/images/product-details/rating.png')}}" alt="" />
								<span>
									<span>{{$product_by_details->product_price}}</span>
									<form action="{{url('show_cart')}}" method="post" enctype="multipart/form-data">
										@csrf
									<label for="qty">Quantity:</label>
									<input type="text" name="quantity" value="1"/>
									<input type="hidden" name="product_id" value="{{$product_by_details->product_id}}">
									<button type="submit" class="btn btn-fefault cart">
										<i class="fa fa-shopping-cart"></i>
										Add to cart
									</button>
									</form>
								</span>
								<p><b>Availability:</b> In Stock</p>
								<p><b>Condition:</b> New</p>
								<p><b>Brand:</b>{{$product_by_details->manufacture_name}}</p>
								<p><b>Category:</b>{{$product_by_details->category_name}}</p>
								<p><b>Size:</b> {{$product_by_details->product_size}}</p>
							</div><!--/product-information-->
						</div>
					</div><!--/product-details-->
					

				@endsection
