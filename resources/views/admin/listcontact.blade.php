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
                    		<th>Email</th>
                    		<th>Country</th>
                        <th>State</th>
                    		<th>City</th>
                    		<th>Subject</th>
                        <th>Message</th>
                  		</tr>
                  	</thead>
                  	<tbody>
                  		@foreach($getData as $data)    
	                  		<tr>
	                    		<td>{{$data->name}}</td>
	                    		<td>{{$data->email}}</td>
	                    		<td>{{$data->country}}</td>
                          <td>{{$data->state}}</td>
                          <td>{{$data->city}}</td>
                          <td>{{$data->subject}}</td>
                          <td>{{$data->message}}</td>	                    		
	                  		</tr>
	                  	@endforeach
                  	</tbody>
                  	<tfoot>
                  		<tr>
                    		<th>Name</th>
                        <th>Email</th>
                        <th>Country</th>
                        <th>State</th>
                        <th>City</th>
                        <th>Subject</th>
                        <th>Message</th>
                  		</tr>
                  	</tfoot>
                </table>
            </div>
        </div>
    </section>
</div>

@endsection