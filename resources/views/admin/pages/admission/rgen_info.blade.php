@extends('admin.admin_template')

@section('title')
	View Content
@endsection
@section('content')


<div class="row">
    <div class="col-md-6">
      <div class="panel-group">
    <div class="panel panel-default">
    <div class="pull-right">
                  <a href="{{url('admin/add_admission')}}" class="btn btn-primary ">Add Admission</a>
                </div>
      <div class="panel-heading"><h3>Admission</h3>
      <div class="form-group">
          <input class="form-control" type="text" id="search"  name="search" placeholder="Search"></input>
        </div>
      </div>
      <div class="panel-body ">
         <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>Admission Page</th>
                        
                        {{-- <th width="15%"><center>Action</center></th> --}}
                      </tr>
                    </thead>
                    <tbody>
          @foreach($data as $key => $gen)
                      <tr>
                        {{-- <td>{!!$gen->title!!}</td> --}}
            <td><a href="{{url('admin/view_admission', array($gen->id))}}" >{!!$gen->title!!}</a></td>
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
      <a href="{{url('admin/edit_admission',array($title->id))}}" class="btn btn-info">Edit</a>
       <a onclick="return confirm('Are you sure you want to delete {!!$title->title!!}?')" href="{{url('admin/delete_admission',array($title->id))}}" class="btn btn-danger ">Delete</a>
      </div>
      
      <div class="panel-heading">&nbsp;
      
      </div>
      <div class="panel-heading"></div>
      <div class="panel-body">
      <h3>{!!$title->title or "Admission Page Title" !!}</h3> 
      <hr>
      {!!$title->description or "No Content Available Here"!!}
      </div>
    </div>
   
  </div>
       
        
    </div>
  </div>
</div>
 
  @include('admin.search.admission')
@endsection