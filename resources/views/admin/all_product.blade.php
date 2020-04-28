@extends('admin_layout')
@section('admin_content')
	<ul class="breadcrumb">
	<li>
		<i class="icon-home"></i>
		<a href="dashboard">Home</a> 
		<i class="icon-angle-right"></i>
	</li>
	<li><a href="#">All Product</a></li>
</ul>

<div class="row-fluid sortable">		
	<div class="box span12">
		<div class="box-header" data-original-title>
			<h2><i class="halflings-icon user"></i><span class="break"></span>List All Product </h2>
			<div class="box-icon">
				<a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
				<a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
				<a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
			</div>
		</div>
		<div class="box-content">
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
			<table class="table table-striped table-bordered bootstrap-datatable datatable">
			  <thead>
				  <tr>
				  	  <th>Product ID</th>
					  <th>Product Name</th>
					  <th>Product Description</th>
					  <th>Product Size</th>
					  <th>Product Image</th>
					  <th>Product Price</th>			  
					  <th>Status</th>
					  <th>Actions</th>
				  </tr>
			  </thead>   
			  <tbody>
			  	@foreach($datas as $data)
				<tr>
					<td>{{$data->product_id}}</td>
					<td>{{$data->product_name}}</td>
					<td class="center">{{$data->product_short_description}}</td>
					<td class="center">{{$data->product_size}}</td>

					<td><img src="{{URL::to($data->product_image)}}" style="height: 80px; width: 80px;"></td>

					<td class="center">{{$data->publication_status}}</td>
					<td class="center">
						@if($data->publication_status == 1)
						<span class="label label-success">Active</span>
						@else
						<span class="label label-badge">Unactive</span>
						@endif
					</td>
					<td class="center">
						@if($data->publication_status == 1)
						<a class="btn btn-danger" href="{{url('/unactive_product/'.$data->product_id)}}">
							<i class="halflings-icon white thumbs-down"></i>  
						</a>
						@else
						<a class="btn btn-success" href="{{url('/active_product/'.$data->product_id)}}">
							<i class="halflings-icon white thumbs-up"></i>  
						</a>
						@endif
						<a class="btn btn-info" href="{{url('/edit_product/'.$data->product_id)}}">
							<i class="halflings-icon white edit"></i>  
						</a>

						<a class="btn btn-danger" href="{{url('/delete_product/'.$data->product_id)}}" id="delete">
							<i class="halflings-icon white trash"></i> 
						</a>
					</td>
				</tr>
				@endforeach
			  </tbody>
		  </table>            
		</div>
	</div><!--/span-->

</div><!--/row-->

@endsection