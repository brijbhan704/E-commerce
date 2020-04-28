@extends('admin_layout')
@section('admin_content')
<div class="row-fluid sortable">
	<div class="box span6">
		<div class="box-header">
			<h2><i class="halfings-icon align-justify"></i><span class="break"></span>Customer Details</h2>
		</div>
		<div class="box-content">
			<table class="table">
				<thead>
					<tr>
						<th>UserName</th>
						<th>UseEmail</th>
						<th>Phone</th>
					</tr>
				</thead>
				<tbody>
					@foreach($viewProducts as $key => $viewProduct)
					@endforeach
					<tr>
						<td>{{$viewProduct->customer_name}}</td>
						<td>{{$viewProduct->customer_email}}</td>
						<td>{{$viewProduct->phone}}</td>
					</tr>
					
				</tbody>
				
			</table>
			
		</div>
	</div>

	<div class="box span6">
		<div class="box-header">
			<h2><i class="halfings-icon align-justify"></i><span class="break"></span>Payment Details</h2>
		</div>
		<div class="box-content">
			<table class="table table-striped">
				<thead>
					<tr>
						<th>Payment ID</th>
						<th>Payment Method</th>
						<th>Payment Status</th>
						
					</tr>
				</thead>
				<tbody>
					
					<tr>
						<td>{{$viewProduct->payment_id}} </td>
						<td>{{$viewProduct->payment_method}}</td>
						<td><span class="label label-success">{{$viewProduct->payment_status}}</span></td>
						
					</tr>
					
				</tbody>
				
			</table>
			
		</div>
	</div><!-- span -->

</div><!-- row -->

<div class="row-fluid sortable">
	<div class="box span12">
		<div class="box-header" data-original-title>
			<h2><i class="halfings-icon align-justify"></i><span class="break"></span>Shipping Details</h2>
		</div>
		<div class="box-content">
			<table class="table table-striped">
				<thead>
					<tr>
						<th>UserName</th>
						<th>Address</th>
						<th>Phone</th>
						<th>Shipping Email</th>
						<th>Shipping City</th>
						<th>Shipping Zip Code</th>
						<th>Order Date/Time</th>
					</tr>
				</thead>
				<tbody>
					@foreach($viewProducts as $key => $viewProduct)
					@endforeach
					<tr>
						<td>{{$viewProduct->shipping_first_name}} {{$viewProduct->shipping_last_name}}</td>
						<td>{{$viewProduct->shipping_address}}</td>
						<td>{{$viewProduct->shipping_phone}}</td>
						<td>{{$viewProduct->shipping_email}}</td>
						<td>{{$viewProduct->shipping_city}}</td>
						<td>{{$viewProduct->shipping_zipcode}}</td>
						<td>{{$viewProduct->created_at}}</td>
					</tr>
					
				</tbody>
		
				
			</table>
			
		</div>
	</div><!-- span -->
</div><!-- row -->

<div class="row-fluid sortable">
	<div class="box span12">
		<div class="box-header" data-original-title>
			<h2><i class="halfings-icon align-justify"></i><span class="break"></span>Order Details</h2>
		</div>
		<div class="box-content">
			<table class="table table-striped">
				<thead>
					<tr>
						<th>ID</th>
						<th>Order Number</th>
						<th>Product Name</th>
						<th>Product Price</th>
						<th>Product Sales Qty</th>
						<th>Product Sub Total</th>
						<th>Order Status</th>
					</tr>
				</thead>
				<tbody>
						 @foreach($viewProducts as $key => $viewProduct)
					<tr>
						<td>{{$viewProduct->order_id}}</td>
						<td>{{$viewProduct->order_number}}</td>
						<td>{{$viewProduct->product_name}}</td>
						<td>{{$viewProduct->product_price}}</td>
						<td>{{$viewProduct->product_sales_quantity}}</td>
						<td>{{$viewProduct->product_price* $viewProduct->product_sales_quantity}}</td>
						<td><span class="label label-success">{{$viewProduct->order_status}}</span></td>
					</tr>
					@endforeach
				</tbody>
				<tfoot>
					<tr>
						<td colspan="5">Total With Vat:</td>
						<td><strong> Total. = {{$viewProduct->order_total}}</strong></td>
					</tr>
				</tfoot>
				
			</table>
			
		</div>
	</div><!-- span -->
</div><!-- row -->


@endsection