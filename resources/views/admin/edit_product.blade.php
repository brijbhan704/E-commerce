@extends('admin_layout')
@section('admin_content')

<ul class="breadcrumb">
<li>
	<i class="icon-home"></i>
	<a href="dashboard">Home</a>
	<i class="icon-angle-right"></i> 
</li>
<li>
	<i class="icon-edit"></i>
	<a href="#">Update Product</a>
</li>
</ul>

<div class="row-fluid sortable">
<div class="box span12">
	<div class="col-12">
        @if (session('message'))
            <div class="alert alert-success alert-dismissible" role="alert">
                {{ session('message') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
    </div>
    <div class="col-12">
	    @if (session('error'))
	        <div class="alert alert-danger alert-dismissible" role="alert">
	            {{ session('error') }}
	            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
	                <span aria-hidden="true">&times;</span>
	            </button>
	        </div>
	    @endif
	</div>
	<div class="box-header" data-original-title>
		<h2><i class="halflings-icon edit"></i><span class="break"></span>Update New Product</h2>
		<div class="box-icon">
			<a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
			<a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
			<a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
		</div>
	</div>
	<div class="box-content">
		<form class="form-horizontal" method="post" action="{{url('/update_product/'.$data->product_id)}}" enctype="multipart/form-data">
			{{@csrf_field()}}
		  <fieldset>
			<div class="control-group">
			  <label class="control-label" for="date01">Product Name</label>
			  <div class="controls">
				<input type="text" class="input-xlarge" name="product_name" value="{{$data->product_name}}">
			  </div>
			</div>
			
			<div class="control-group">
				<label class="control-label" for="selectError3">Product Category</label>
				<div class="controls">
				  <select id="selectError3" name="product_category">
				  	<?php 
                        $categories = DB::table('tbl_category')->where('category_id',$data->category_id)->get();
                        foreach ($categories as $key => $category) {                   
                        ?>

					<option value="{{$category->category_id}}">{{$category->category_name}}</option>
					<?php
                     }
                    ?>
					
				  </select>
				</div>
			 </div>
			 
          
			<div class="control-group hidden-phone">
			  <label class="control-label" for="textarea2">Product Short Description</label>
			  <div class="controls">
				<textarea class="cleditor" name="product_short_description" rows="1" value="">{{$data->product_short_description}}</textarea>
			  </div>
			</div>
			<div class="control-group hidden-phone">
			  <label class="control-label" for="textarea2">Product long Description</label>
			  <div class="controls">
				<textarea class="cleditor" name="product_long_description" rows="1" value="">{{$data->product_long_description}}</textarea>
			  </div>
			</div>
			
			<div class="control-group">
			  <label class="control-label" for="date01">Product Price</label>
			  <div class="controls">
				<input type="text" class="input-xlarge" name="product_price" value="{{$data->product_price}}">
			  </div>
			</div>
			<div class="control-group">
			  <label class="control-label" for="date01">Product Size</label>
			  	<div class="controls">
				<input type="text" class="input-xlarge" name="product_size" value="{{$data->product_size}}">
			  	</div>
			</div>
			<div class="control-group">
			  <label class="control-label" for="date01">Product Color</label>
			  <div class="controls">
				<input type="text" class="input-xlarge" name="product_color" value="{{$data->product_color}}">
			  </div>
			</div>
			
			<div class="control-group">
			  <label class="control-label" for="fileInput">Product Image</label>
			  <div class="controls">
				<input class="input-file uniform_on" name="product_image" type="file"><img src="{{URL::to($data->product_image)}}" style="height: 80px; width: 80px;">
			  </div>
			</div> 
			
			<div class="form-actions">
			  <button type="submit" class="btn btn-primary">Update Product</button>
			  
			</div>
		  </fieldset>
		</form>   

	</div>
</div><!--/span-->

</div><!--/row-->

@endsection