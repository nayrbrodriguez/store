@extends('admin.admin_template')

@section('title')
  Customer
@endsection



@section('content')


<div class="row">
    <div class="col-md-6">
      <div class="panel-group">
    <div class="panel panel-default">
<div class="pull-right">
                  <a href="{{url('/add_customer')}}" class="btn btn-primary ">Add Customer</a>
                </div>
      
      <div class="panel-heading">
      <h3>Customers</h3>
        <div class="form-group">
          <input class="form-control" type="text" id="search"  name="search" placeholder="Search"></input>
        </div>
      </div>
      <div class="panel-body">
         <table id="example1" class="table table-bordered table-striped table-hover">
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
            <td><a href="{{url('view_customer', array($gen->id))}}?page={{$data->currentpage()}}" >{!!$gen->name !!}</a></td>
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
      <div class="panel-heading">
       {{--  <a href="{{url('edit_arabic_department',array($title->id))}}" class="btn btn-info">Edit</a>
       <a onclick="return confirm('Are you sure you want to delete {!!$title->title!!}?')" href="{{url('delete_course_offering',array($title->id))}}" class="btn btn-danger ">Delete</a> --}}
      </div>
      <div class="panel-heading">{{-- {!!$title->title or "Title" !!}  --}}</div>
      <div class="panel-body">{{-- {!!$title->description or "Department"!!} --}}
      Choose any Customers to view, update or delete.
      <br>
      <br>
      <br>
      <br>
      <br><br>
      <br>
      <br>
      <br>
      <br><br>
      <br>
      <br>
      <br>
      <br>
      </div>
    </div>
   
  </div>
       
        
    </div>
  </div>
</div>
 @include('admin.search.about')

@endsection
