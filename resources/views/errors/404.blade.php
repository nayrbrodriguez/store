@extends('user.user_layout')



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
		        	{{-- <form id="form-search" action="search.php" method="GET" accept-charset="utf-8" class="form-404" >
		            	<div class="clearfix">
		                    <input type="text" name="s" onBlur="if(this.value=='') this.value=''" onFocus="if(this.value =='' ) this.value=''" >
		                    <a href="#" onClick="document.getElementById('form-search').submit()" class="btn btn_ btn-small_">search</a>
		                </div>
		            </form> --}}
				</div>  
		    </div>  
		  </div>
		</div>  
		</section>
@endsection