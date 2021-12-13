@extends('admin.layouts.header')
@section('content')
<style type="text/css">
	.pdtp{ padding-top: 30px;}
	.mrgtp{ margin-top: 30px;}
</style>
<div class="content-wrapper">
	<section class="content mrgtp">
      	<div class="card">
            <div class="card-header">
                <h3 class="card-title">Project List</h3>
            </div>
              <!-- /.card-header -->
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                	<thead>
                  		<tr>
                    		<th>Name</th>
                    		<th>Description</th>
                    		<th>Images</th>
                    		<th>Price</th>
                    		<th>Status</th>
                    		<th>Action</th>
                  		</tr>
                  	</thead>
                  	<tbody>
                  		@foreach($getData as $data)

                  		<?php $imageData = json_decode($data->images, true); ?>
    
	                  		<tr>
	                    		<td>{{$data->name}}</td>
	                    		<td>{{$data->description}}</td>
	                    		<td>
	                    			@foreach($imageData as $value)
	                    				<img src="{{asset('uploads/').'/'.$value}}" width="60" height="60">
	                    			@endforeach
	                    		</td>
	                    		<td>{{$data->price}}</td>
	                    		<td>
	                    			@if($data->status ==1)
	                    				Active
	                    			@else
	                    				Inactive
	                    			@endif
	                    		</td>
	                    		<td>
	                    			<a href='{{route("editproject",$data->id) }}'><i class="fa fa-edit" aria-hidden="true"></i></a> &nbsp;&nbsp;&nbsp;
	                    			<a href='{{route("deleteproject",$data->id) }}' onclick="return confirm('Are you sure?')"><i class="fa fa-trash" aria-hidden="true"></i></a>
	                    		</td>
	                  		</tr>
	                  	@endforeach
                  	</tbody>
                  	<tfoot>
                  		<tr>
                    		<th>Name</th>
                    		<th>Description</th>
                    		<th>Images</th>
                    		<th>Price</th>
                    		<th>Status</th>
                    		<th>Action</th>
                  		</tr>
                  	</tfoot>
                </table>
            </div>
        </div>
    </section>
</div>

@endsection