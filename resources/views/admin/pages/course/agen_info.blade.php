@extends('admin.admin_template')

@section('title')
	Create Course
@endsection


@section('content')
	
		<div class="panel panel-default">
			<div class="panel-heading">
				<h4>@yield('title')</h4>
			</div>
			<div class="panel-body">
				<form action="{{ url('admin/create_course_offering') }}" method="post">
					<div class="form-group">
						<label for="course">Course</label>
						<input type="text" name="course" class="form-control">
					</div>
					
					<div class="form-group">
						<input type="submit" name="send" id="send" value="Publish" class="btn btn-success">
						<a href="{{url('admin/course_offering')}}" class="btn btn-danger">Back</a>
						{!! csrf_field() !!}

					</div>
				</form>
			</div>
		
	</div>
	
@endsection