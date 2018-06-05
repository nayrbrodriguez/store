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
            
            <td class="table-selected"><a style="color: white;" href="{{url('view_customer', array($gen->id))}}?page={{$data->currentPage()}}" data-toggle="modal" data-target="#myModal">{!!$gen->name!!}</a></td>
            @else
            <td><a href="{{url('view_customer', array($gen->id))}}?page={{$data->currentPage()}}" data-toggle="modal" data-target="#myModal">{!!$gen->name!!}</a></td>
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
      <div type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Open Modal</div>
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

      <div class="table">
        <div class="tr">
          <div class="td thead"><b>Status:</b></div>
          <div class="td">{!!$title->status or "NOT YET AVAILABLE"!!}</div>
        </div>
        <div class="tr">
          <div class="td thead"><b>Gender:</b></div>
          <div class="td">{!!$title->gender or "NOT YET AVAILABLE"!!}</div>
        </div>
        <div class="tr">
          <div class="td thead"><b>Address:</b></div>
          <div class="td">{!!$title->address or "NOT YET AVAILABLE"!!}</div>
        </div>
        <div class="tr">
          <div class="td thead"><b>Contact:</b></div>
          <div class="td">{!!$title->contact or "NOT YET AVAILABLE"!!}</div>
        </div>
      </div>

      </div>
    </div>
   
  </div>
    {{-- MODAL --}}
    <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Modal Header</h4>
        </div>
        <div class="modal-body">
          <p>Some text in the modal.</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
       
        
    </div>
  </div>
</div>
 @include('admin.search.about')
@endsection