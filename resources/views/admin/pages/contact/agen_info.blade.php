@extends('admin.admin_template')

@section('title')
	Create Contact Details
@endsection


@section('content')
	
		<div class="panel panel-default">
			<div class="panel-heading">
				<h4>@yield('title')</h4>
			</div>
			<div class="panel-body">
				<form action="{{ url('admin/add_contact') }}" method="post">
					
					<div class="form-group">
						<label for="type">Type</label>
						<select class="form-control" id="sel1" name="type">
						    <option>Tel</option>
						    <option>Email</option>
						    <option>Fax</option>
						    <option>Address</option>
					  	</select>
					</div>
					<div class="form-group">
						<label for="description">Description</label>
						<input type="text" name="description" class="form-control" value="{{old('description')}}">
					</div>
					
					
					<div class="form-group">
						<input type="submit" name="send" id="send" value="Publish" class="btn btn-success">
						<a href="{{url('admin/contact')}}" class="btn btn-danger">Back</a>
						{!! csrf_field() !!}

					</div>
				</form>
			</div>
		
	</div>
	
@endsection