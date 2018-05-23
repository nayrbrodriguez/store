@extends('admin.admin_template')

@section('title')
	Create Administrative
@endsection


@section('content')
	

		<div class="panel panel-default">
			<div class="panel-heading">
				<h4>@yield('title')</h4>
			</div>
			<div class="panel-body">
				<form action="{{ url('admin/create_administrative') }}" method="post" enctype="multipart/form-data">
					<div class="form-group">
						<label for="name">Name</label>
						<input type="text" name="name" class="form-control" value="{{old('name')}}">
					</div>
					<div class="form-group">
						<label for="position">Position</label>
						<input type="text" name="position" class="form-control" value="{{old('position')}}">
					</div>
					<div class="form-group">
						<label for="image">Image</label>
						<input type="file" name="image" class="form-control" value="{{old('image')}}">
					</div>

					<div class="form-group">
						<label for="number">Contact Number</label>
						<input type="text" name="number" class="form-control" value="{{old('number')}}">
					</div>
					<div class="form-group">
						<label for="email">email</label>
						<input type="text" name="email" class="form-control" value="{{old('email')}}">
					</div>
					<div class="form-group">
						<input type="submit" name="send" id="send" value="Publish" class="btn btn-success">
						<a href="{{url('admin/administrative')}}" class="btn btn-danger">Back</a>
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