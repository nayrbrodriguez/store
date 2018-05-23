@extends('admin.admin_template')

@section('title')
	View News
@endsection
@section('content')


<div class="row">
    <div class="col-md-6">
      <div class="panel-group">
    <div class="panel panel-default">
    <div class="pull-right">
                  <a href="{{url('admin/add_news')}}" class="btn btn-primary ">Add News</a>
                </div>
      <div class="panel-heading"><h3>News</h3>
      <div class="form-group">
          <input class="form-control" type="text" id="search"  name="search" placeholder="Search"></input>
        </div>
      </div>
      <div class="panel-body ">
         <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>News List</th>
                        
                        {{-- <th width="15%"><center>Action</center></th> --}}
                      </tr>
                    </thead>
                    <tbody>
          @foreach($data as $key => $gen)
                      <tr>
                        {{-- <td>{!!$gen->title!!}</td> --}}
            <td><a href="{{url('admin/view_news', array($gen->id))}}" >{!!$gen->title!!}</a></td>
            {{-- <td>
              <a href="{{url('view_course_offering', array($gen->id))}}" class="btn btn-primary">View</a>
              <a href="{{url('edit_course_offering',array($gen->id))}}" class="btn btn-info">Edit</a>
              <a href="{{url('delete_course_offering',array($gen->id))}}" class="btn btn-danger " type="button">Delete</a>
              <a onclick="return confirm('Are you sure you want to delete {!!$gen->title!!}?')" href="{{url('delete_course_offering',array($gen->id))}}" class="btn btn-danger ">Delete</a>
              
            </td> --}}
                      </tr>
                    @endforeach
                    </tbody>
                    
                  </table>

      </div>
    </div>
   
  </div>
    </div>
    <div class="col-md-6">

    <div class="panel-group">
    <div class="panel panel-default">
    
        <div class="pull-right">
      <a href="{{url('admin/edit_news',array($title->id))}}" class="btn btn-info">Edit</a>
       <a onclick="return confirm('Are you sure you want to delete {!!$title->title!!}?')" href="{{url('admin/delete_news',array($title->id))}}" class="btn btn-danger ">Delete</a>
      </div>
      
      <div class="panel-heading">&nbsp;
      
      </div>
      <div class="panel-heading"></div>
      <div class="panel-body">
      <img src="{{ url('/uploads/news', $title->image) }}" style="width:auto; height: 200px; float: left;  margin-right:25px; border:1px black solid;">
      <table class="table table-striped">
  
      <tr>
        <td><b>Title:</b></td><td> {!!$title->title!!}</td>
      </tr>

      <tr>
        <td><b>Date:</b> </td><td>{!!$title->date!!}</td>
      </tr>

      <tr>
        <td>
      <b>Short Description:</b></td><td> {!!$title->description or "No Short Description"!!}</td>
      </tr>
           
      </table>
        <hr>
        <b>Content</b>
        <hr>
        {!!$title->content!!}
      </div>
    </div>
   
  </div>
       
        
    </div>
  </div>
</div>
 @include('admin.search.news')
@endsection