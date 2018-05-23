@extends('admin.admin_template')

@section('title')
	Create Alumni
@endsection


@section('content')
	
		<div class="panel panel-default">
			<div class="panel-heading">
				<h4>@yield('title')</h4>
			</div>
			<div class="panel-body">
				<form action="{{ url('admin/add_alumni') }}" method="post">
					<div class="form-group">
						<label for="id">Alumni ID</label>
						<input type="text" name="id" class="form-control" value="{{old('id')}}">
					</div>
					<div class="form-group">
						<label for="name">Name</label>
						<input type="text" name="name" class="form-control" value="{{old('name')}}">
					</div>
					<div class="form-group">
						<label for="year_grad">Year Graduated</label>
						<input type="text" name="year_grad" class="form-control" value="{{old('year_grad')}}">
					</div>
					<div class="form-group">
						<label for="course">Course</label>
						<input type="text" name="course" class="form-control" value="{{old('course')}}">
					</div>
					
					<div class="form-group">
						<input type="submit" name="send" id="send" value="Publish" class="btn btn-success">
						<a href="{{url('admin/alumni')}}" class="btn btn-danger">Back</a>
						{!! csrf_field() !!}

					</div>
				</form>
			</div>
		
	</div>
	
@endsection