@extends('admin_layout')
@section('admin_content')
<head>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
</head>
	<ul class="breadcrumb">
	<li>
		<i class="icon-home"></i>
		<a href="dashboard">Home</a> 
		<i class="icon-angle-right"></i>
	</li>
	<li><a href="#">Order Details</a></li>
</ul>

<div class="row-fluid sortable">		
	<div class="box span12">
		<div class="box-header" data-original-title>
			<h2><i class="halflings-icon user"></i><span class="break"></span>List All Orders </h2>
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
				  	 <th>Order ID</th>
				  	 <th>Order Number</th>
					  <th>Customer Name</th>
					  <th>Order Total</th>
					  <th>Status</th>
					  <th>Actions</th>
					  
				  </tr>
			  </thead>   
			  <tbody>
			  	@foreach($manageProduct as $product)
				<tr>
					<td>{{$product->order_id}}</td>
					<td>{{$product->order_number}}</td>
					<td>{{$product->customer_name}}</td>
					<td class="center">{{$product->order_total}}</td>
					<!-- <td class="center">{{$product->order_status}}</td> -->
					<td class="center">
						@if($product->order_status == 'pending')
						<span class="label label-success">Pending</span>
						@else
						<span class="label label-badge">Done</span>
						@endif
					</td>
					<td class="center">
						@if($product->order_status == 'pending')
						<a class="btn btn-danger" href="{{url('/unactive/'.$product->order_id)}}">
							<i class="halflings-icon white thumbs-down"></i>  
						</a>
						@else
						<a class="btn btn-success" href="{{url('/active/'.$product->order_id)}}">
							<i class="halflings-icon white thumbs-up"></i>  
						</a>
						@endif
						<a class="btn btn-info" href="{{url('/show_product/'.$product->order_id)}}">
							<i class="halflings-icon white edit"></i>  
						</a>

						<a class="btn btn-danger" href="{{url('/delete/'.$product->order_id)}}" id="delete">
							<i class="halflings-icon white trash"></i> 
						</a>
						<a href="#" class="btn btn-info">
				          <span class="glyphicon glyphicon-user"></span>  
				        </a>
					</td>
					

				</tr>
				@endforeach
			  </tbody>
		  </table>            
		</div>
	</div><!--/span-->

</div><!--/row-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
@endsection