@extends('layout')
@section('content')			
<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="#">Home</a></li>
				  <li class="active">Check out</li>
				</ol>
			</div><!--/breadcrums-->

		
			<div class="register-req">
				<p>Please full this form</p>
			</div><!--/register-req-->

			<div class="shopper-informations">
				<div class="row">
					<div class="col-md-12 clearfix">
						<div class="bill-to">
							<p>Shipping Details</p>
							<div class="form-one">
								<form action="{{url('save_shipping')}}" method="post">
									@csrf
									<input type="text" name="shipping_email" placeholder="Email*">
									<input type="text" name="shipping_first_name"  placeholder="First Name *">
									<input type="text"  name="shipping_last_name" placeholder="Last Name">
									<input type="text" name="shipping_address"  placeholder="Address">
									<input type="text" name="shipping_mobile_number"  placeholder="Mobile number*">
									<input type="text" name="shipping_city"  placeholder="City">
									<input type="submit" class="btn btn-warning" value="Done">
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section> <!--/#cart_items-->

	

	
	


    <script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.scrollUp.min.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/main.js"></script>
</body>
</html>

@endsection