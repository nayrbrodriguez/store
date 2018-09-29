@extends('admin.admin_template')

@section('title')
Create accounts
@endsection


@section('content')


<div class="panel panel-default">
	<div class="panel-heading">
		<h4>@yield('title')</h4>
	</div>
	<div class="panel-body">
		<form action="{{ url('create_accounts') }}" method="post">
			<div class="form-group">
				<label for="account">Account Name</label>
				<input type="text" name="account" class="form-control" value="{{old('account')}}">
			</div>
			<div class="form-group">
				<label for="username">Username/Email</label>
				<input type="text" name="username" class="form-control" value="{{old('username')}}">
			</div>
			<div class="form-group">
				<label for="password">Password</label>
				<input type="password" name="password" value="{{old('password')}}" class="form-control" id="myPassword">
				<input type="checkbox" onclick="myFunction()">Show Password
				<br><br>
			</div>

			<div class="form-group">
				<input type="submit" name="send" id="send" value="Publish" class="btn btn-success">
				<a href="{{url('accounts')}}" class="btn btn-danger">Back</a>
				{!! csrf_field() !!}

			</div>
		</form>
	</div>

</div>
<script>
	function myFunction() {
		var x = document.getElementById("myPassword");
		if (x.type === "password") {
			x.type = "text";
		} 
		else{
			x.type = "password";
		}

	}
</script>
@endsection