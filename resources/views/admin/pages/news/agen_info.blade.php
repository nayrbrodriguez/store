@extends('admin.admin_template')

@section('title')
	Create News
@endsection


@section('content')
	

		<div class="panel panel-default">
			<div class="panel-heading">
				<h4>@yield('title')</h4>
			</div>
			<div class="panel-body">
				<form  action="{{ url('admin/create_news') }}" method="post" enctype="multipart/form-data">
					<div class="form-group">
						<label for="title">Title</label>
						<input type="text" name="title" class="form-control" value="{{old('title')}}">
					</div>
					<div class="form-group">
						<label for="date">Date </label><i>  (Format: YYYY/MM/DD)</i>
						<input type="text" name="date"  class="form-control" placeholder="YYYY/MM/DD" value="{{old('date')}}">
					</div>
					<div class="form-group">
						<label for="image">Image</label>
						<input type="file" name="image" class="form-control" value="{{old('image')}}">
					</div>
					<div class="form-group">
						<label for="description">Short Description</label>
						<textarea name="description" class="form-control" rows="5" value="{{old('description')}}"></textarea>
						
					</div>
					
					<div class="form-group">
						<label for="description">Content</label>
						<textarea id="summernote" name="summernote" class="form-control" >
							{{old('summernote')}}
						</textarea>
					</div>
					<div class="form-group">
						<input type="submit" name="send" id="send" value="Publish" class="btn btn-success">
						<a href="{{url('admin/about_news')}}" class="btn btn-danger">Back</a>
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

<script>

@endsection