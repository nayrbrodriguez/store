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
                  <a href="{{url('add_customer')}}" class="btn btn-primary ">Add Customer</a>
                </div>
      <div class="panel-heading"><h3>Customer</h3>
      <div class="form-group">
          <input class="form-control" type="text" id="search"  name="search" placeholder="Search"></input>
        </div>
      </div>
      <div class="panel-body ">
         <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>Customer's Lists</th>
                        
                        {{-- <th width="15%"><center>Action</center></th> --}}
                      </tr>
                    </thead>
                    <tbody>
          @foreach($data as $key => $gen)
                      <tr>
                        {{-- <td>{!!$gen->title!!}</td> --}}
            @if($gen->id == $title->id)
            <td class="table-selected"><a style="color: white;" href="{{url('view_customer', array($gen->id))}}?page={{$data->currentPage()}}" >{!!$gen->name!!}</a></td>
            @else
            <td><a href="{{url('view_customer', array($gen->id))}}?page={{$data->currentPage()}}" >{!!$gen->name!!}</a></td>
            @endif
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
                  {{$data->links()}}
 
      </div>
    </div>
   
  </div>
    </div>
    <div class="col-md-6">

    <div class="panel-group">
    <div class="panel panel-default">
    
        <div class="pull-right">
      <a href="{{url('edit_customer',array($title->id))}}?page={{$data->currentPage()}}" class="btn btn-info">Edit</a>
       <a onclick="return confirm('Are you sure you want to delete {!!$title->name!!}?')" href="{{url('delete_customer',array($title->id))}}" class="btn btn-danger ">Delete</a>
      </div>
      
      <div class="panel-heading">&nbsp;
      
      </div>
      <div class="panel-heading"></div>
      <div class="panel-body">
      <h3>{!!$title->name or "Customer Name" !!}</h3> 
      <hr>
      <table name="tab" class="table-striped table-bordered">
      <tr><td>
      <p><h5> Status: </h5> </td><td>{!!$title->status or "NOT YET AVAILABLE"!!}
      </tr></td>
      <br>
      <tr><td>
      <p><h5> Gender: </h5> </td><td>{!!$title->gender or "NOT YET AVAILABLE"!!}
      </tr></td>
      <br>
      <tr><td>
      <p><h5> Address: </h5> </td><td>{!!$title->address or "NOT YET AVAILABLE"!!}
      </tr></td>
      <br>
      <tr><td>
      <p><h5> Contact: </h5> </td><td>{!!$title->contact or "NOT YET AVAILABLE"!!}
      </tr></td>
      </table>
      </div>
    </div>
   
  </div>
       
        
    </div>
  </div>
</div>
 @include('admin.search.about')
@endsection