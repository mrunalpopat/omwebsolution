@extends('admin.layouts.header')
@section('content')
<style type="text/css">
	.pdtp{ padding-top: 30px;}
</style>
<div class="content-wrapper">
	<section class="content">
      	<div class="row">
        	<div class="col-md-12 pdtp">
          		<div class="card card-primary">
            		<div class="card-header">
              			<h3 class="card-title">Edit Project</h3>

			             <div class="card-tools">
			                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
			                  <i class="fas fa-minus"></i>
			                </button>
			            </div>
			        </div>
            		<div class="card-body">
            			<form method="post" action="{{route('updateproject')}}" enctype="multipart/form-data">
            				@if ($message = Session::get('success'))
				                <div class="alert alert-success">
				                    <strong>{{ $message }}</strong>
				                </div>
				            @endif

				            @if (count($errors) > 0)
				                <div class="alert alert-danger">
				                    <ul>
				                        @foreach ($errors->all() as $error)
				                        <li>{{ $error }}</li>
				                        @endforeach
				                    </ul>
				                </div>
				            @endif

            				@csrf

            				<input type="hidden" name="pid" value="{{$getData->id}}">
            				
	              			<div class="form-group">
	                			<label for="inputName">Project Name</label>
	                			<input type="text" id="project_name" name="project_name" class="form-control" value="{{$getData->name}}">
	              			</div>
			              	<div class="form-group">
			                	<label for="inputDescription">Technology</label>
			                	<textarea id="technology" name="technology" class="form-control" rows="2">{{$getData->technology}}</textarea>
			              	</div>
			              	<div class="form-group">
			                	<label for="inputDescription">Can be Used</label>
			                	<textarea id="can_be_used" name="can_be_used" class="form-control" rows="2">{{$getData->can_be_used}}</textarea>
			              	</div>
			              	<div class="form-group">
			                	<label for="inputDescription">Modules</label>
			                	<textarea id="modules" name="modules" class="form-control" rows="3">{{$getData->modules}}</textarea>
			              	</div>
			              	<div class="form-group">
			                	<label for="inputDescription">Project Description</label>
			                	<textarea id="project_desc" name="project_desc" class="form-control" rows="4">{{$getData->description}}</textarea>
			              	</div>
			              	<div class="form-group">
	                			<label for="inputClientCompany">Images</label>
	                			<input type="file" id="images" name="images[]" class="form-control" multiple="multiple">
	              			</div>
	              			<?php
	              				$imageData = json_decode($getData->images, true);
	              				if($imageData)
	              				{
		              				foreach($imageData as $value)
		              				{ ?>
		                    			<img src="{{asset('uploads/').'/'.$value}}" width="60" height="60">
		                    		<?php }
		                    	}
	              			?>

	              			<div class="imgPreview"> </div>

	              			<div class="form-group">
	                			<label for="inputClientCompany">Price</label>
	                			<input type="text" id="project_price" name="project_price" class="form-control" value="{{$getData->price}}">
	              			</div>
			              	<div class="form-group">
			                	<label for="inputStatus">Status</label>
			                	<select id="project_status" name="project_status" class="form-control custom-select">
			                  		<option selected disabled>Select one</option>
			                  		<option value="1" @if($getData->status ==1) selected @endif>Active</option>
			                  		<option value="0" @if($getData->status ==0) selected @endif>Inactive</option>
			                	</select>
			              	</div>

		              		<input type="submit" value="Update Porject" class="btn btn-success float-right">
		              	</form>
            		</div>
          		</div>
        	</div>
      	</div>
    </section>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script>
        $(function() {
        // Multiple images preview with JavaScript
        var multiImgPreview = function(input, imgPreviewPlaceholder) {

            if (input.files) {
                var filesAmount = input.files.length;

                for (i = 0; i < filesAmount; i++) {
                    var reader = new FileReader();

                    reader.onload = function(event) {
                        $($.parseHTML('<img>')).attr('src', event.target.result).height(120).width(120).appendTo(imgPreviewPlaceholder);
                    }

                    reader.readAsDataURL(input.files[i]);
                }
            }

        };

        $('#images').on('change', function() {
            multiImgPreview(this, 'div.imgPreview');
        });
        });    
    </script>
@endsection