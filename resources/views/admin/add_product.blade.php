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
	<a href="#">Add Product</a>
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
		<h2><i class="halflings-icon edit"></i><span class="break"></span>Add New Product</h2>
		<div class="box-icon">
			<a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
			<a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
			<a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
		</div>
	</div>
	<div class="box-content">
		<form class="form-horizontal" method="post" action="create_product" enctype="multipart/form-data">
			{{@csrf_field()}}
		  <fieldset>
			<div class="control-group">
			  <label class="control-label" for="date01">Product Name</label>
			  <div class="controls">
				<input type="text" class="input-xlarge" name="product_name" required="">
			  </div>
			</div>
			<div class="control-group">
				<label class="control-label" for="selectError3">Product Category</label>
				<div class="controls">
				  <select id="selectError3" name="product_category">
				  	 <option>Select Category</option>
					<?php 
                        $categories = DB::table('tbl_category')->where('publication_status',1)->get();
                        foreach ($categories as $key => $category) {                   
                        ?>

					<option value="{{$category->category_id}}">{{$category->category_name}}</option>
					<?php
                     }
                    ?>
					
				  </select>
				</div>
			 </div>
			 <div class="control-group">
				<label class="control-label" for="selectError3">Product Brand  </label>
				<div class="controls">
				  <select id="selectError3" name="product_brand">
				  	<option>Select Brands</option>
				  	 <?php 
                        $brands = DB::table('tbl_manufacture')->where('publication_status',1)->get();
                        foreach ($brands as $key => $brand) {                   
                        ?>           
					<option value="{{$brand->manufacture_id}}">{{$brand->manufacture_name}}</option>
					<?php
                     }
                    ?>
				  </select>
				</div>
			 </div>
          
			<div class="control-group hidden-phone">
			  <label class="control-label" for="textarea2">Product Short Description</label>
			  <div class="controls">
				<textarea class="cleditor" name="product_short_description" rows="1" required=""></textarea>
			  </div>
			</div>
			<div class="control-group hidden-phone">
			  <label class="control-label" for="textarea2">Product long Description</label>
			  <div class="controls">
				<textarea class="cleditor" name="product_long_description" rows="1" required=""></textarea>
			  </div>
			</div>
			
			<div class="control-group">
			  <label class="control-label" for="date01">Product Price</label>
			  <div class="controls">
				<input type="text" class="input-xlarge" name="product_price" required="">
			  </div>
			</div>
			<div class="control-group">
			  <label class="control-label" for="date01">Product Size</label>
			  	<div class="controls">
				<input type="text" class="input-xlarge" name="product_size" required="">
			  	</div>
			</div>
			<div class="control-group">
			  <label class="control-label" for="date01">Product Color</label>
			  <div class="controls">
				<input type="text" class="input-xlarge" name="product_color" required="">
			  </div>
			</div>
			
			<div class="control-group">
			  <label class="control-label" for="fileInput">Product Image</label>
			  <div class="controls">
				<input class="input-file uniform_on" name="product_image" type="file">
			  </div>
			</div> 
			<div class="control-group hidden-phone">
			  <label class="control-label" for="textarea2">Publication Status</label>
			  <div class="controls">
				<input type="checkbox" class="input-xlarge" name="publication_status" value="1" required="">
			  </div>
			</div>
			<div class="form-actions">
			  <button type="submit" class="btn btn-primary">Add Product</button>
			  <button type="reset" class="btn">Cancel</button>
			</div>
		  </fieldset>
		</form>   

	</div>
</div><!--/span-->

</div><!--/row-->

@endsection