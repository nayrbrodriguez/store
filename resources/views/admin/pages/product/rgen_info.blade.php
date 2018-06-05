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
                  <a href="{{url('add_product')}}" class="btn btn-primary ">Add Product</a>
                </div>
      <div class="panel-heading"><h3>Product</h3>
      <div class="form-group">
          <input class="form-control" type="text" id="search"  name="search" placeholder="Search"></input>
        </div>
      </div>
      <div class="panel-body ">
         <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>Product's Lists</th>
                        
                        {{-- <th width="15%"><center>Action</center></th> --}}
                      </tr>
                    </thead>
                    <tbody>
          @foreach($data as $key => $gen)
                      <tr>
                        {{-- <td>{!!$gen->title!!}</td> --}}
            <td><a href="{{url('view_product', array($gen->id))}}" >{!!$gen->prod_name!!}</a></td>
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
      <a href="{{url('edit_product',array($title->id))}}" class="btn btn-info">Edit</a>
       <a onclick="return confirm('Are you sure you want to delete {!!$title->prod_name!!}?')" href="{{url('delete_product',array($title->id))}}" class="btn btn-danger ">Delete</a>
      </div>
      
      <div class="panel-heading">&nbsp;
      
      </div>
      <div class="panel-heading"></div>
      <div class="panel-body">
      <h3>{!!$title->prod_name or "Product Name" !!}</h3> 
      <hr>
      <table name="tab" class="table-striped table-bordered">
      <tr><td>
      <p><h5> Status: </h5> </td><td>{!!$title->status or "NOT YET AVAILABLE"!!}
      <br>
      <tr><td>
      <p><h5> Quantity: </h5> </td><td>{!!$title->prod_qty or "NOT YET AVAILABLE"!!}
      </tr></td>
      <br>
      <tr><td>
      <p><h5> Original Price: </h5> </td><td>{!!$title->orig_price or "NOT YET AVAILABLE"!!}
      </tr></td>
      <br>
      <tr><td>
      <p><h5> Sale Price: </h5> </td><td>{!!$title->price_for_sale or "NOT YET AVAILABLE"!!}
      </tr></td>
      <br>
      <tr><td>
      <p><h5> Credit Price: </h5> </td><td>{!!$title->price_for_credit or "NOT YET AVAILABLE"!!}
      </tr></td>
      <br>
      <tr><td>
      <p><h5> Date Added: </h5> </td><td>{!!date('M d, Y', strtotime($title->date_register))!!}
      </tr></td>
      </table>
      </div>
    </div>
   
  </div>
       
        
    </div>
  </div>
</div>
 @include('admin.search.product')
@endsection