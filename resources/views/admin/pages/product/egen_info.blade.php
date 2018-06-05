@extends('admin.admin_template')

@section('title')
  Update 
@endsection
  

@section('content')


<div class="row">
    <div class="col-md-6">
      <div class="panel-group">
    <div class="panel panel-default">
    <div class="pull-right">
                  <a href="{{url('add_product')}}" class="btn btn-primary ">Add Product Page</a>
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
                        <th>Product Lists</th>
                        
                        {{-- <th width="15%"><center>Action</center></th> --}}
                      </tr>
                    </thead>
                    <tbody>
          @foreach($data as $key => $gen)
                      <tr id="result">
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

   <div class="panel panel-default">
      <div class="panel-heading">
        <h4>@yield('title')</h4>
      </div>
      <div class="panel-body">
        <form action="{{ url('update_product') }}" method="post">

            <input type="hidden" name="id" value="{!!$title->id!!}">
          <div class="form-group">
            <label for="prod_name">Products Name</label>
            <input type="text" name="prod_name" class="form-control" value="{!!$title->prod_name!!}">
          </div>
          <div class="form-group">
            <label for="prod_qty">Quantity</label>
            <input type="text" name="prod_qty" class="form-control" value="{!!$title->prod_qty!!}">
          </div>
          <div class="form-group">
            <label for="orig_price">Original Price</label>
            <input type="text" name="orig_price" class="form-control" value="{!!$title->orig_price!!}">
          </div>
          <div class="form-group">
            <label for="price_for_sale">For Sale Price</label>
            <input type="text" name="price_for_sale" class="form-control" value="{!!$title->price_for_sale!!}">
          </div>
          <div class="form-group">
            <label for="price_for_credit">Credit Price</label>
            <input type="text" name="price_for_credit" class="form-control" value="{!!$title->price_for_credit!!}">
          </div>
          {{-- <div class="form-group">
                    <label for="status">Status</label>
                    <select name="status" class="form-control" value="{!!$title->status!!}">
                      <option value="{!!$title->status!!}" selected disabled hidden>

                       
                        @if ( $title->status = "out" )
                          Out of Stock
                        @else
                          Has Stock
                        @endif
                      </option>
                      <option value="out">Out of Stock</option>
                      <option value="has">Has Stock</option>
                    </select>
          </div> --}}
          
          
          <div class="form-group">
            <input type="submit" name="send" id="send" value="Update" class="btn btn-success">
            <a href="{{url('view_product/'.$title->id)}}" class="btn btn-danger">Back</a>
            {!! csrf_field() !!}

          </div>
        </form>
      </div>
    </div>
       
        
    </div>
  </div>
</div>
 <script type="text/javascript">
    $(document).ready(function(argument) {
      $('#summernote').summernote({
        height: '200px',
        placeholder:'Content here....',
        fontNames:['Arial','Arial Black','Khmer OS'],
      })
    })
    $('#clear').on('click',function() {
    $('#summernote').summernote('code',null);     
    })

  </script>

  @include('admin.search.product')
@endsection















{{-- 
@section('')
  
    <div class="panel panel-default">
      <div class="panel-heading">
        <h4>@yield('title')</h4>
      </div>
      <div class="panel-body">
        <form action="{{ url('update_arabic_department') }}" method="post">
          <div class="form-group">

            <label for="title">Title</label>
            <input type="hidden" name="id" value="{!!$data->id!!}">
            <input type="text" name="title" class="form-control" value="{!!$data->title!!}">
          </div>
          <div class="form-group">
            <textarea id="summernote" name="summernote" class="form-control">
              {!! $data->description !!}
            </textarea>
          </div>
          <div class="form-group">
            <input type="submit" name="send" id="send" value="Update" class="btn btn-success">
            <a href="{{url('gen_info')}}" class="btn btn-danger">Back</a>
            {!! csrf_field() !!}

          </div>
        </form>
      </div>
    </div>
  
  <script type="text/javascript">
    $(document).ready(function(argument) {
      $('#summernote').summernote({
        height: '200px',
        placeholder:'Content here....',
        fontNames:['Arial','Arial Black','Khmer OS'],
      })
    })
    $('#clear').on('click',function() {
    $('#summernote').summernote('code',null);     
    })

  </script>
@endsection --}}