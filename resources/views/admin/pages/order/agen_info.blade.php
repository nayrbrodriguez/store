@extends('admin.admin_template')

@section('title')
	Create Order
@endsection


@section('content')
	

		<div class="panel panel-default">
			<div class="panel-heading">
				<h4>@yield('title')</h4>
			</div>
			<div class="panel-body">
				<form action="{{ url('create_order') }}" method="post">
					{{-- <div class="form-group">
						<label for="name">Name</label>
						<input type="text" name="name" class="form-control" value="{{old('name')}}">
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
	                </div> --}}
					<div class="form-group">
	                  <label for="cust_id">Name of Customer</label>
	                  <select name="cust_id"  id="name" class="form-control">
	                  	<option value="" selected disabled hidden>Select Customer</option>
	                  	@foreach($customers as $cust)
	                    <option value="{!!$cust->id!!}">{!!$cust->name!!}</option>
	                    @endforeach
	                  </select>
	                </div>
	                <div class="form-group">
	                  <label for="prod_id">Products</label>
	                  <select name="prod_id" id="product" class="form-control">
	                  	<option value="" selected disabled hidden>Select Product</option>
						@foreach($products as $prod)
	                    <option value="{!!$prod->id!!}"><b>{!!$prod->prod_name!!}</b> (Sale Price: {!!$prod->price_for_sale!!})</option>

	                    @endforeach
	                  </select>
	                </div>
	                <div class="form-group">
						<label for="qty">Quantity</label>
						<input type="number" name="qty" id="qty" class="form-control" value="{{old('qty')}}">
					</div>


					
					<div class="form-group">
						<button type="button" class="btn btn-default" data-dismiss="modal" data-toggle="modal" data-target="#myModal" onclick="myFunction()">Confirm</button>
						<a href="#myModal" data-toggle="modal" data-target="#myModal" >Load me</a>
						<a href="{{url('customer')}}" class="btn btn-danger">Back</a>
						{!! csrf_field() !!}

					</div>
				{{-- </form> --}}
			</div>

			<!-- Modal -->
			<div id="myModal" class="modal fade" role="dialog">
			  <div class="modal-dialog">

			    <!-- Modal content-->
			    <div class="modal-content">
			      <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal">&times;</button>
			        <h4 class="modal-title">Modal Header</h4>
			      </div>
			      <div class="modal-body">
			      	<p id="demo"></p>
			      	{{-- {!!$total!!} --}}
			        
			      </div>
			      <div class="modal-footer">
			      	<input type="submit" name="send" id="send" value="Add Order" class="btn btn-success" >
			        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			      </div>
			    </div>

			  </div>
			</div>
			</form>
		
	</div>
	<script type="text/javascript">
		function myFunction() {
		    var qtyx = document.getElementById("qty");
		    var namex = document.getElementById("name")
		    var qty = qtyx.value;
		    var name = namex.value;
		    
		    document.getElementById("demo").innerHTML = "<br>The current qty is: " + qty + "x<br>" + "Customer Name:" + name;
		}
		
		

    </script>
@endsection