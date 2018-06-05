@extends('admin.admin_template')

@section('title')
	Create Customer
@endsection


@section('content')
	

		<div class="panel panel-default">
			<div class="panel-heading">
				<h4>@yield('title')</h4>
			</div>
			<div class="panel-body">
				<form action="{{ url('create_customer') }}" method="post">
					<div class="form-group">
						<label for="name">Name</label>
						<input type="text" name="name" class="form-control" value="{{old('name')}}">
					</div>
					<div class="form-group">

						<input type="hidden" name="admin_id" class="form-control" value="{{Auth::user()->id}}">
					</div>
					<div class="form-group">
						<label for="address">Address</label>
						<input type="text" name="address" class="form-control" value="{{old('address')}}">
					</div>
					<div class="form-group">
						<label for="contact">Contact Number</label>
						<input type="text" name="contact" class="form-control" value="{{old('contact')}}">
					</div>
					
					<div class="form-group">
	                  <label for="gender">Gender</label>
	                  <select name="gender" class="form-control">
	                    <option>Male</option>
	                    <option>Female</option>
	                  </select>
	                </div>
					<div class="form-group">
	                  <label for="status">Status</label>
	                  <select name="status" class="form-control">
	                    <option value="active">Active</option>
	                    <option value="inactive">InActive</option>
	                    <option value="banned">Banned</option>
	                  </select>
	                </div>
					
					<div class="form-group">
						<input type="submit" name="send" id="send" value="Publish" class="btn btn-success">
						<a href="{{url('customer')}}" class="btn btn-danger">Back</a>
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