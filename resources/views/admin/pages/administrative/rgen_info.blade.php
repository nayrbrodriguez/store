@extends('admin.admin_template')

@section('title')
	View Administrative
@endsection
@section('content')


<div class="row">
    <div class="col-md-6">
      <div class="panel-group">
    <div class="panel panel-default">
    <div class="pull-right">
                  <a href="{{url('admin/add_administrative')}}" class="btn btn-primary ">Add Administrative</a>
                </div>
      <div class="panel-heading"><h3>Administrative Officer</h3>
      <div class="form-group">
          <input class="form-control" type="text" id="search"  name="search" placeholder="Search"></input>
        </div>
      </div>
      <div class="panel-body ">
         <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>Administrative Officer List</th>
                        
                        {{-- <th width="15%"><center>Action</center></th> --}}
                      </tr>
                    </thead>
                    <tbody>
          @foreach($data as $key => $gen)
                      <tr>
                       
                        <td><a href="{{url('admin/view_administrative', array($gen->id))}}" >{!!$gen->name!!}</a></td>
                        
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
      <a href="{{url('admin/edit_administrative',array($title->id))}}" class="btn btn-info">Edit</a>
       <a onclick="return confirm('Are you sure you want to delete {!!$title->name!!}?')" href="{{url('admin/delete_administrative',array($title->id))}}" class="btn btn-danger ">Delete</a>
      </div>
      
      <div class="panel-heading"><h1>Details</h1> 
      
      </div>
      <div class="panel-heading"></div>
      <div class="panel-body">
      
      <img src="{{ url('/uploads/image', $title->image) }}" style="width:150px; height: 150px; float: left;  margin-right:25px; border:1px black solid;">
      <table class="table table-striped">
  
      <tr>
        <td><b>Name:</b></td><td> {!!$title->name!!}</td>
      </tr>
      <tr>
        <td>
      <b>Position:</b></td><td> {!!$title->position!!}</td>
      </tr>
      
      <tr>
        <td><b>Contact:</b> </td><td>{!!$title->number or "No Contact Available"!!}</td>
      </tr>
      
      <tr>
        <td><b>Email:</b> </td><td>{!!$title->email or "No Email Available"!!}</td>
      </tr>
      </table>
      {{-- {!!$title->banner or "No Banner Available"!!} --}}
      </div>
    </div>
   
  </div>
       
        
    </div>
  </div>
</div>

  @include('admin.search.administrative')
@endsection