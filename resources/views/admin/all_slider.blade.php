@extends('admin_layout')
@section('admin_content')
	<ul class="breadcrumb">
	<li>
		<i class="icon-home"></i>
		<a href="dashboard">Home</a> 
		<i class="icon-angle-right"></i>
	</li>
	<li><a href="#">All Slider</a></li>
</ul>

<div class="row-fluid sortable">		
	<div class="box span12">
		<div class="box-header" data-original-title>
			<h2><i class="halflings-icon user"></i><span class="break"></span>List All Slider </h2>
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
				  	  <th>Slider ID</th>
					  <th>Product Image</th>			  
					  <th>Status</th>
					  <th>Actions</th>
				  </tr>
			  </thead>   
			  <tbody>
			  	@foreach($datas as $data)
				<tr>
					<td>{{$data->slider_id}}</td>
					<td><img src="{{URL::to($data->slider_image)}}" style="height: 120px; width: 200px;"></td>

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
						<a class="btn btn-danger" href="{{url('/unactive_slider/'.$data->slider_id)}}">
							<i class="halflings-icon white thumbs-down"></i>  
						</a>
						@else
						<a class="btn btn-success" href="{{url('/active_slider/'.$data->slider_id)}}">
							<i class="halflings-icon white thumbs-up"></i>  
						</a>
						@endif
						<a class="btn btn-info" href="{{url('/edit_slider/'.$data->slider_id)}}">
							<i class="halflings-icon white edit"></i>  
						</a>

						<a class="btn btn-danger" href="{{url('/delete_slider/'.$data->slider_id)}}" id="delete">
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