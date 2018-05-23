@extends('admin.admin_template')

@section('title')
	Create Banner
@endsection


@section('content')
	

		<div class="panel panel-default">
			<div class="panel-heading">
				<h4>@yield('title')</h4>
			</div>
			<div class="panel-body">
				<form action="{{ url('admin/create_banner') }}" method="post" enctype="multipart/form-data">
					<div class="form-group">
						<label for="title">Title</label>
						<input type="text" name="title" class="form-control" value="{{old('title')}}">
					</div>
					<div class="form-group">
						<label for="banner">Banner</label>
						<input type="file" name="banner" class="form-control" value="{{old('banner')}}">
					</div>
					
					<div class="form-group">
						<input type="submit" name="send" id="send" value="Publish" class="btn btn-success">
						<a href="{{url('admin/banner')}}" class="btn btn-danger">Back</a>
						{!! csrf_field() !!}

					</div>
				</form>
			</div>
		
	</div>
	<script type="text/javascript">

        $(document).ready(function(argument) {
            $('#summernote').summernote({
                height: '200px',
                placeholder:'Place your content here',
                fontNames:['Arial','Arial Black','Khmer OS'],
            })
        })
        $('#clear').on('click',function() {
        $('#summernote').summernote('code',null);           
        })

    </script>
@endsection