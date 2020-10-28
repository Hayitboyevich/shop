@extends('admin_layout')
@section('admin_content')

<ul class="breadcrumb">
				<li>
					<i class="icon-home"></i>
					<a href="{{url('dashboard')}}">Home</a>
					<i class="icon-angle-right"></i> 
				</li>
				<li>
					<i class="icon-edit"></i>
					<a href="{{URL::to('update_category')}}">Update Category</a>
				</li>
			</ul>
			<p class="alert-success">
				<?php
					$message = Session::get('message');
					if ($message) {
						echo $message;
						Session::put('message', null);
					}

				?>
			</p>
			<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon edit"></i><span class="break"></span> Elements Category</h2>
					</div>
					<div class="box-content">
						<form class="form-horizontal" action="{{URL::to('update_category',$category_info->category_id)}}" method="post" enctype="multipart/form-data">
							@csrf
						  <fieldset>
							<div class="control-group">
							  <label class="control-label" for="category_name">Category Name</label>
							  <div class="controls">
								<input type="text" class="input-xlarge" name="category_name" value="{{$category_info->category_name}}">
							  </div>
							</div> 

							<div class="control-group hidden-phone">
							  <label class="control-label" for="textarea2">Category Description</label>
							  <div class="controls">
								<textarea class="cleditor" name="category_description" rows="3">
									{{$category_info->category_description}}
								</textarea>
							  </div>
							</div>

							<div class="form-actions">
							  <button type="submit" class="btn btn-primary">Update</button>
							</div>
						  </fieldset>
						</form>   

					</div>
				</div><!--/span-->

			</div><!--/row-->



@endsection