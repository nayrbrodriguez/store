@extends('admin.admin_template')

@section('title')
	Create
@endsection


@section('content')
	
		<div class="panel panel-default">
			<div class="panel-heading">
				<h4>@yield('title')</h4>
			</div>
			<div class="panel-body">
				<form action="{{ url('admin/create_gen_info') }}" method="post">
					<div class="form-group">
						<label for="title">Title</label>
						<input type="text" name="title" class="form-control">
					</div>
					<div class="form-group">
						<label for="description">Content</label>
						<textarea id="summernote" name="summernote" class="form-control">
							
						</textarea>
					</div>
					<div class="form-group">
						<input type="submit" name="send" id="send" value="Publish" class="btn btn-success">
						<a href="{{url('admin/gen_info')}}" class="btn btn-danger">Back</a>
						{!! csrf_field() !!}

					</div>
				</form>
			</div>
		
	</div>
	<script type="text/javascript">

        $(document).ready(function(argument) {
            $('#summernote').summernote({
                height: '200px',
                placeholder:'Content here....',
                fontNames:['Arial','Arial Black','Khmer OS'],
            })
        })
        $('#clear').on('click',function() {
        $('#summernote').summernote('code',null);           
        })

    </script>
@endsection