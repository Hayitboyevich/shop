@extends('layout')
@section('content')
<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="#">Home</a></li>
				  <li class="active">Shopping Cart</li>
				</ol>
			</div>
			<div class="table-responsive cart_info">
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="image">Item</td>
							<td class="description"></td>
							<td class="price">Price</td>
							<td class="quantity">Quantity</td>
							<td class="total">Total</td>
							<td></td>
						</tr>
					</thead>
					<tbody>
						<tr>
	<?php foreach($all_published_category as $v_product) {?>
							<td class="cart_product">
								<a href=""><img src="{{URL::to($v_product->product_image)}}" style="height:200px; width:200px" alt=""></a>
							</td>
							<td class="cart_description">
								<h4><a href=""{{$v_product->product_name}}</a></h4>
								<p>{{$v_product->product_short_description}}</p>
							</td>
							<td class="cart_price">
								<p>${{$v_product->product_price}}</p>
							</td>
							<td class="cart_quantity">
								<div class="cart_quantity_button">
									<a class="cart_quantity_up" href=""> + </a>
									<input class="cart_quantity_input" type="text" name="quantity" value="1" autocomplete="off" size="2">
									<a class="cart_quantity_down" href=""> - </a>
								</div>
							</td>
							<td class="cart_total">
								<p class="cart_total_price">$59</p>
							</td>
							<td class="cart_delete">
								<a class="cart_quantity_delete" href=""><i class="fa fa-times"></i></a>
							</td>
							<?php } ?>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</section> <!--/#cart_items-->

	<section id="do_action">
		<div class="container">
			<div class="heading">
				<h3>What would you like to do next?</h3>
			</div>
			<div class="row">
				<div class="col-sm-8">
					<div class="total_area">
						<ul>
							<li>Cart Sub Total <span>$59</span></li>
							<li>Eco Tax <span>$2</span></li>
							<li>Shipping Cost <span>Free</span></li>
							<li>Total <span>$61</span></li>
						</ul>
							<a class="btn btn-default update" href="#">Update</a>
							<?php  $customer_id= Session::get('customer_id')?>
                                 <?php  if($customer_id!= Null){?>
                                 <a class="btn btn-default check_out" href="{{URL::to('checkout')}}">Check Out</a>
                                  <?php } else{ ?>
                                  <li><a class="btn btn-default check_out" href="{{URL::to('login_check')}}"><i class="btn btn-default "> Checkout</a></li>
                                   <?php } ?>
					</div>
				</div>
			</div>
		</div>
	</section><!--/#do_action-->
@endsection