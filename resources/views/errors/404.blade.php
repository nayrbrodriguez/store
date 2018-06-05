@extends('admin.error')



@section('title')
	Page Not Found
@endsection



@section('content')
	<section id="content">
		<div class="sub-content">
		  <div class="container">
		    <div class="row block-404">
		    	
		    	<div class="span4">
		        	<h1>Sorry!</h1>
		        	<h4>404 page not found</h4>
		            <p class="p3">The page you are looking for might have been removed, had its name changed, or is temporarily unavailable.</p>
		        	<a class="btn btn-primary" href="{{url('/home')}}">Back to home</a>
				</div>  
		    </div>  
		  </div>
		</div>  
		</section>
@endsection