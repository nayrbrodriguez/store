@extends('admin.admin_template')

@section('title')
  Update Profile
  {{-- {!!$title->title!!} --}}
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
        <form action="{{url('search_customer')}}" method="post">
          <input class="form-control" style="width:50%;" type="text" id="search"  name="name" placeholder="Search" />
          <button class="btn btn-primary" type="submit" name="send">Submit</button>
        </form>
          
        </div>
      </div>
      <div class="panel-body ">
         <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>Customer Pages</th>
                        
                        {{-- <th width="15%"><center>Action</center></th> --}}
                      </tr>
                    </thead>
                    <tbody>
          @foreach($data as $key => $gen)
                      <tr>
            @if($gen->id == $title->id)
            <td class="table-selected"><a style= "color: white" href="{{url('view_customer', array($gen->id))}}?page={{$data->currentPage()}}" >{!!$gen->name!!}</a></td>
            @else
            <td><a href="{{url('view_customer', array($gen->id))}}?page={{$data->currentPage()}}" >{!!$gen->name!!}</a></td>
            @endif
                      </tr>
                    @endforeach
                    </tbody>
                    
                  </table>
                  {{-- <div disabled>{{$data->links()}}</div> --}}

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
        <form action="{{ url('update_customer/'.$data->currentPage()) }}" method="post">
          <div class="form-group">

            <label for="name">Name</label>
            <input type="hidden" name="id" value="{!!$title->id!!}">
            <input type="text" name="name" class="form-control" value="{!!$title->name!!}">
          </div>
          <div class="form-group">

            <label for="address">Address</label>
            <input type="text" name="address" class="form-control" value="{!!$title->address!!}">
          </div>
          <div class="form-group">

            <label for="contact">Contact Number</label>
            <input type="text" name="contact" class="form-control" value="{!!$title->contact!!}">
          </div>

          <div class="form-group">
                    <label for="gender">Gender</label>
                    <select name="gender" class="form-control">
                      
                      @if($title->gender === 'Male')

                        <option value="{!!$title->gender!!}" selected >{!!$title->gender!!}</option>
                        <option value="female">Female</option>

                      @else
                        <option value="male">Male</option>
                        <option value="{!!$title->gender!!}" selected >{!!$title->gender!!}</option>
                        

                      @endif

                      
                    </select>
                  </div>
          <div class="form-group">
                    <label for="status">Status</label>
                    <select name="status" class="form-control" value="{!!$title->status!!}">
                      <option value="{!!$title->status!!}" {{ $title->status == $title->status ? 'selected': ''}} disabled hidden>{!!$title->status!!}</option>
                      @if($title->status === 'active')

                        <option value="{!!$title->status!!}" selected>Active</option>
                        <option value="inactive">Inactive</option>
                        <option value="banned">Banned</option>

                      @elseif($title->status === 'inactive')

                        <option value="active">Active</option>
                        <option value="{!!$title->status!!}" selected>Inactive</option>
                        <option value="banned">Banned</option>

                      @else

                        <option value="active">Active</option>
                        <option value="inactive">Inactive</option>
                        <option value="{!!$title->status!!}" selected>Banned</option>

                      @endif
                      
                      
                      
                    </select>
          </div>
          {{-- <div class="form-group">
            <textarea id="summernote" name="summernote" class="form-control">
              {!! $title->description !!}
            </textarea>
          </div> --}}
          <div class="form-group">
            <input type="submit" name="send" id="send" value="Update" class="btn btn-success">
            <a href="{{url('view_customer/'.$title->id)}}?page={{$data->currentPage()}}" class="btn btn-danger">Back</a>
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

  @include('admin.search.about')
@endsection


