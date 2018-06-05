@extends('admin.admin_template')

@section('title')
	Create Product
@endsection


@section('content')
	

		<div class="panel panel-default">
			<div class="panel-heading">
				<h4>@yield('title')</h4>
			</div>
			<div class="panel-body">
				<form action="{{ url('create_product') }}" method="post">
					<div class="form-group">
						<input type="hidden" name="color" class="form-control" value="{{$randomString}}">
					</div>
					<div class="form-group">
						<input type="hidden" name="admin_id" class="form-control" value="{{Auth::user()->id}}">
					</div>
					<div class="form-group">
						<label for="prod_name">Products Name</label>
						<input type="text" name="prod_name" class="form-control" value="{{old('prod_name')}}">
					</div>
					<div class="form-group">
						<label for="prod_qty">Quantity</label>
						<input type="text" name="prod_qty" class="form-control" value="{{old('prod_qty')}}">
					</div>
					<div class="form-group">
						<label for="orig_price">Original Price</label>
						<input type="text" name="orig_price" class="form-control" value="{{old('orig_price')}}">
					</div>
					<div class="form-group">
						<label for="price_for_sale">Price For Sale</label>
						<input type="text" name="price_for_sale" class="form-control" value="{{old('price_for_sale')}}">
					</div>

					<div class="form-group">
						<label for="price_for_credit">Price For Credits</label>
						<input type="text" name="price_for_credit" class="form-control" value="{{old('price_for_credit')}}">
					</div>
					
					<div class="form-group">
						<input type="submit" name="send" id="send" value="Publish" class="btn btn-success">
						<a href="{{url('product')}}" class="btn btn-danger">Back</a>
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